<?php
namespace Zzld\Foundation\Support;

use Config;
use Form;
use Html;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;

use Zzld\Foundation\Models\Watchdog;

/**
 * 抽取脚手架方法使得任何控制器都可以方便的扩展此功能
 */
trait Scaffoldable
{
    /**
     * 根据 $model_name 创建model对象
     */
	private function getModel($model_name){
        $models = Config::get('scaffold.models');
        $modelClass = isset($models[$model_name]) ? $models[$model_name] : null;
        if(!$modelClass){
            return abort(404);
        }
        return new $modelClass;
    }

	/**
	 * 用户授权
	 */
	private function authCheck($model_name, $action){
		$adminEnable = config('zzld_foundation.admin_enable', false);
		$authEnable = config('zzld_foundation.auth_enable', false);
		$loginUrl = config('zzld_foundation.login_url', '/login');

		if($adminEnable && $authEnable){
			if (!Gate::allows('scaffold-gate', [$model_name, $action])) {
				return view('zzld-foundation::errors.403');
			}
		}
	}

    /**
     * 列出所有对象
     */
    public function index(Request $request, $model_name, $format='html'){

		if($check = $this->authCheck($model_name, 'list')){
			return $check;
		}

        $inputs = $request->input();
        $pageSize = $request->input('ps', 50);
        $modelObj = $this->getModel($model_name);
        $query = $modelObj->where([]);
        $rows = null;
        $params = [];

        $except_params = ['ps', 'page'];
        foreach($inputs as $key=>$value){
            if($value && !in_array($key, $except_params)){
                $params[$key]=$value;
            }
        }

        if($params){
            foreach($params as $key=>$val){
                if(is_numeric($val)){
                    $query = $query->where($key, $val);
                }else{
                    $query = $query->where($key, 'like', "%{$val}%");
                }
            }
        }

        if(property_exists($modelObj, 'list_order')){
            $query = $query->orderBy($modelObj->list_order[0], $modelObj->list_order[1]);
        }

        $rows = $query->paginate($pageSize);

        $data = [
            'page'          => $rows,
            'ps'            => $pageSize,
            'model'         => $modelObj,
            'format'        => $format,
            'params'        => $params,
        ];

        if($format=='json'){
            $data['code'] = '0';
            $data['msg'] = '';
            return $data;
        }

        return view('zzld-foundation::scaffold.index', $data);
    }

    /**
     * 展示对象
     */
    public function show(Request $request, $model_name, $id, $format='html'){
		if($check = $this->authCheck($model_name, 'show')){
			return $check;
		}

        $modelObj = $this->getModel($model_name);
        $modelIns = $modelObj->find($id);

        if($format == 'json'){
            return $modelIns;
        }

        $data = [
            'model' => $modelObj,
            'modelIns' => $modelIns,
        ];
        return view('zzld-foundation::scaffold.show', $data);
    }

    /**
     * 外键选择
     */
    public function modelSelect(Request $request, $model_name, $format='html'){

		if($check = $this->authCheck($model_name, 'list')){
			return $check;
		}

        $inputs = $request->input();
        $pageSize = $request->input('ps', 50);
        $modelObj = $this->getModel($model_name);
        $query = $modelObj->where([]);
        $rows = null;
        $params = [];

        $except_params = ['ps', 'page'];
        foreach($inputs as $key=>$value){
            if($value && !in_array($key, $except_params)){
                $params[$key]=$value;
            }
        }

        if($params){
            foreach($params as $key=>$val){
                if(is_numeric($val)){
                    $query = $query->where($key, $val);
                }else{
                    $query = $query->where($key, 'like', "%{$val}%");
                }
            }
        }

        if(property_exists($modelObj, 'list_order')){
            $query = $query->orderBy($modelObj->list_order[0], $modelObj->list_order[1]);
        }

        $rows = $query->paginate($pageSize);

        $data = [
            'page'          => $rows,
            'ps'            => $pageSize,
            'model'         => $modelObj,
            'format'        => $format,
            'params'        => $params,
        ];

        if($format=='json'){
            $data['code'] = '0';
            $data['msg'] = '';
            return $data;
        }

        return view('zzld-foundation::scaffold.list-inline', $data);
    }

    /**
     * 编辑
     */
    public function edit(Request $request, $model_name, $id){
		if($check = $this->authCheck($model_name, 'edit')){
			return $check;
		}
        $modelObj = $this->getModel($model_name);
        $modelIns = $modelObj->find($id);
        // echo Form::model($modelIns, ['route' => ['scaffold_edit', $model_name, $modelIns->id]]);
        $data = [
            'model' => $modelObj,
            'modelIns' => $modelIns,
            'act' => 'edit',
        ];
        return view('zzld-foundation::scaffold.edit', $data);
    }

    public function update(Request $request, $model_name, $id){
		if($check = $this->authCheck($model_name, 'update')){
			return $check;
		}

        $input = $request->input();
        foreach($input as $key => $val){ //如果此字段为空串则不进行处理
            if($val == ''){
                unset($input[$key]);
            }
        }

        $modelObj = $this->getModel($model_name);
        $modelIns = $modelObj->find($id);

        //处理文件上传
        $files = $request->file();
        if ($files) {
            foreach ($files as $key => $obj) {
                $ext = $obj->getClientOriginalExtension();
                $name = $obj->getFilename();
                $new_name = md5(date('ymdhis') . $name) . "." . $ext;
                $obj->move('uploads', $new_name);
                $input[$key] = '/uploads/' . $new_name;
            }
        }

        $modelIns->update($input);
        $modelIns->save();
        //$modelIns->before_update();
        //$modelIns->after_update();

        return redirect()->route('scaffold_list', ['model_name'=>$modelObj->model_name]);
    }

    /**
     * 删除对象
     */
    public function destory(Request $request, $model_name, $id, $format){
		if($check = $this->authCheck($model_name, 'destory')){
			return $check;
		}

        $modelObj = $this->getModel($model_name);
        $modelIns = $modelObj->find($id);

        $modelIns->before_destory();
        $result = $modelIns->delete();
        $modelIns->after_destory();

        if($format=='json'){
            $data['code'] = '-1';
            $data['message'] = 'error';

			if($result){
				$data['code'] = '0';
				$data['message'] = 'ok';
			}
            return $data;
        }
        return redirect()->route('scaffold_list', ['model_name'=>$model_name,]);
    }

    /**
     * 批量删除
     */
    public function destoryAll(Request $request, $model_name, $format){
		if($check = $this->authCheck($model_name, 'destory')){
			return $check;
		}

        $ids = $request->input('ids');
        $modelObj = $this->getModel($model_name);
        $modelIns = $modelObj->whereIn('id', $ids);
        $result = $modelIns->delete();

        if($format=='json'){
            $data['code'] = '-1';
            $data['message'] = 'error';

			if($result){
				$data['code'] = '0';
				$data['message'] = 'ok';
			}
            return $data;
        }
        return redirect()->route('scaffold_list', ['model_name'=>$model_name,]);
    }

    /**
     * 创建对象
     */
    public function create(Request $request, $model_name){
		if($check = $this->authCheck($model_name, 'create')){
			return $check;
		}

        $modelObj = $this->getModel($model_name);
        $data = [
            'model' => $modelObj,
            'modelIns' => null,
            'act' => 'create',
        ];
        return view('zzld-foundation::scaffold.edit', $data);
    }

    /**
     * 存储数据
     */
    public function store(Request $request, $model_name){
		if($check = $this->authCheck($model_name, 'store')){
			return $check;
		}

        $modelObj = $this->getModel($model_name);
        $this->validate($request, $modelObj->rule());

        //处理文件上传
		$inputs = $request->input();
        foreach($inputs as $key => $val){
            if($val == ''){
                unset($inputs[$key]);
            }
        }

        $files = $request->file();
        if ($files) {
            foreach ($files as $key => $obj) {
                $ext = $obj->getClientOriginalExtension();
                $name = $obj->getFilename();
                $new_name = md5(date('ymdhis') . $name) . "." . $ext;
                $obj->move('uploads', $new_name);
                $inputs[$key] = '/uploads/' . $new_name;
            }
        }

        $modelIns = new $modelObj($inputs);
        $modelIns->before_save();
        $modelIns->save();
        $modelIns->after_save();

        return redirect()->route('scaffold_list', ['model_name'=>$model_name]);
    }

	public function inline_create($model_name, $id, $rela_model, $rela){
		$modelObj = $this->getModel($model_name);
		$relaObj = $this->getModel($rela_model);
		if(isset($modelObj->rela_model()[$rela]['default_value'])){
			$default = $modelObj->rela_model()[$rela]['default_value'];
			foreach($default as $key => $val){
				$relaObj->$key = $val;
			}
		}
		
		$data = [
			'model' => $relaObj,
			'model_name' => $model_name,
			'rela_model' => $rela_model,
			'id' => $id,
			'rela' => $rela,
			'modelIns' => $relaObj,
		];
		return view('zzld-foundation::scaffold.edit-inline', $data);
	}

	public function inline_store(Request $request, $model_name, $id, $rela_model, $rela){
		if($check = $this->authCheck($model_name, 'store')){
			return $check;
		}

        $modelObj = $this->getModel($model_name);
		$relaObj =  $this->getModel($rela_model);

        $this->validate($request, $relaObj->rule());

        //处理文件上传
		$inputs = $request->input();
        $files = $request->file();
        if ($files) {
            foreach ($files as $key => $obj) {
                $ext = $obj->getClientOriginalExtension();
                $name = $obj->getFilename();
                $new_name = md5(date('ymdhis') . $name) . "." . $ext;
                $obj->move('uploads', $new_name);
                $inputs[$key] = '/uploads/' . $new_name;
            }
        }


        $relaIns = new $relaObj($inputs);
		$modelIns = $modelObj->find($id);
		$modelIns->{$rela}()->save($relaIns);

		$data = [
			'message' => '保存成功',
		];
        return view('zzld-foundation::scaffold.result', $data);
	}
}
