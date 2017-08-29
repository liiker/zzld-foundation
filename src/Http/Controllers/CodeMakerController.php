<?php

namespace Zzld\Foundation\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodeMakerController extends Controller
{
    protected $database = null;

	public function __construct(){
		$this->database = config('zzld_foundation.codemaker.db', '');
	}
    public function index(){
		if(!$this->database){
			return "请配置代码生成器默认连接数据库";
		}
        $tables = DB::select("show tables from {$this->database}");

        $data = [
			'database' => $this->database,
            'tables' => $tables,
			'code_model' => null,
			'code_list' => null,
			'code_form' => null,
			'code_controller' => null,
        ];
        return view('zzld-foundation::codemaker.index', $data);
    }

    public function makeModel(Request $request, $table_name){
        $class_name = str_replace('t_', '', $table_name);
        $class_name = (str_singular(camel_case($class_name)));
        $class_name[0] = strtoupper($class_name[0]);
        $sql = "select * from information_schema.columns where TABLE_SCHEMA=? and table_name=? and COLUMN_NAME<>'id' and COLUMN_NAME<>'created_at' and COLUMN_NAME<>'updated_at'";
        $tables = DB::select("show tables from {$this->database}");
        $columns = DB::select($sql, [$this->database, $table_name]);

        $codeData = [
            'class_name' => $class_name,
            'table' => $table_name,
            'columns' => $columns,
        ];

		//dd($codeData);

        $code_model = $this->twig()->render('model.blade.php', $codeData);
        $code_list = $this->twig()->render('list.blade.php', $codeData);
        $code_form = $this->twig()->render('form.blade.php', $codeData);
        $code_controller = $this->twig()->render('controller.blade.php', $codeData);

        $data = [
			'database' => $this->database,
            'class_name' => $class_name,
            'tables' => $tables,
            'columns' => $columns,
            'code_model' => $code_model,
            'code_list' => $code_list,
            'code_form' => $code_form,
            'code_controller' => $code_controller,
        ];

        return view('zzld-foundation::codemaker.index', $data);
    }

    private function twig(){
        $path = __DIR__.'/../../resources/views/snippet/codemaker';
        $loader = new \Twig_Loader_Filesystem($path);
        $twig = new \Twig_Environment($loader, []);
        return $twig;
    }
}
