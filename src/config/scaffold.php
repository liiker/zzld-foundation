<?php

/**
 * ---------------------------------- 配置说明 -------------------------------------
 *
 * 用来配置需要通过脚手架进行管理的模型
 * 脚手架调用的格式为 `/backend/{model_name}/list/{format?}` `format`的可选值是`html or json`默认值是`html`
 * 例如你有一个 App\Models\Test 的 model 那么通过如下的配置你就能通过脚手架直接管理这个模型关联的数据了
 *  `'test' => 'App\Models\Test',`
 *  访问地址 /backend/test/list/[html|json]
 */
return [
	'models' => [
		'user' => 'Zzld\Foundation\Models\User',
		'watchdog' => 'Zzld\Foundation\Models\Watchdog',
		'role' => 'Zzld\Foundation\Models\Role',
		'department' => 'Zzld\Foundation\Models\Department',
		'position' => 'Zzld\Foundation\Models\Position',
		'function' => 'Zzld\Foundation\Models\Function',
	]
];
