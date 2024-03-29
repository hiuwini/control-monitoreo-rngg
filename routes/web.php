 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


//1 Administracion

//LOGIN
Route::get('/signIn', function(){
    return view('/sesion/signin');
});

Route::post('/signIn/authenticate','SesionController@authenticate');

//1.1 Usuarios
Route::get('/admin/users','UserController@index')->name('users.index');
Route::get('/admin/users/create','UserController@create')->name('users.create');
Route::post('/admin/users/store','UserController@store');
Route::get('/admin/users/{id}/edit','UserController@edit')->name('users.edit');
Route::put('/admin/users/{id}','UserController@update');
Route::delete('/admin/users/{id}','UserController@destroy');

//1.2 Roles
Route::view('roles','roles.index')->name('roles');//si
Route::view('roles/create','roles.create')->name('create');//si
Route::view('roles/edit','roles.edit')->name('edit');//si
Route::resource('roles','RolesController'); //si

//1.3 Categoría Institucional
Route::get('/ci','CategoryInstitutionalController@index')->name('ci.index');
Route::get('/ci/create','CategoryInstitutionalController@create')->name('ci.create');
Route::post('/ci/store','CategoryInstitutionalController@store');
Route::get('/ci/{id}/edit','CategoryInstitutionalController@edit')->name('ci.edit');
Route::put('/ci/{id}','CategoryInstitutionalController@update');
Route::delete('/ci/{id}','CategoryInstitutionalController@destroy');


//2 Gestión de Proyectos

//2.1 Proyectos
Route::get('/projects','ProjectController@index')->name('projects.index');
Route::get('/projects/ci/{id}','ProjectController@show');
Route::get('/projects/create','ProjectController@create')->name('projects.create');
Route::post('/projects/store','ProjectController@store');
Route::get('/projects/{id}/edit','ProjectController@edit')->name('projects.edit');
Route::put('/projects/{id}','ProjectController@update');
Route::delete('/projects/{id}','ProjectController@destroy');
Route::get('/project/{id}','ProjectController@admin');

//CRUD TIPOS GESTORES
Route::get('/tipogestores','TipoGestorController@index')->name('tipogestores.index');
Route::get('/tipogestores/create','TipoGestorController@create')->name('tipogestores.create');
Route::post('/tipogestores/store','TipoGestorController@store');
Route::put('/tipogestores/{id}','TipoGestorController@update');
Route::get('/tipogestores/{id}/edit','TipoGestorController@edit')->name('tipogestores.edit');
Route::delete('/tipogestores/{id}','TipoGestorController@destroy');

//PERMISOS
Route::get('/permisos','PermisoController@index')->name('permisos.index');
Route::get('/permisos/edit/{id}','PermisoController@edit')->name('permisos.edit');
Route::put('/permisos/{id}','PermisoController@update');
Route::post('/permisos/store','PermisoController@store');

//Permisos Proyectos
Route::get('/permisosprojects/edit/{id}','PermisoProjectController@edit')->name('permisosprojects.edit');
Route::post('/permisosprojects/store','PermisoProjectController@store');
Route::put('/permisosprojects/{id}','PermisoProjectController@update');

//2.2 Beneficiarios
Route::view('beneficiarios','beneficiarios.index')->name('beneficiarios');
//Route::view('beneficiarios/create','beneficiarios.create')->name('create');//si
Route::get('beneficiarios/create/{id}','BeneficiariosController@create');
Route::view('beneficiarios/edit','beneficiarios.edit')->name('edit');
Route::resource('beneficiarios','BeneficiariosController');

//2.3 Indicadores
Route::get('/indicators/create/{id}','IndicatorController@create');
Route::post('/indicators/store','IndicatorController@store');
Route::get('/indicators/{id}/edit','IndicatorController@edit')->name('indicator.edit');
Route::get('/indicator/{id}','IndicatorController@custom');
Route::put('/indicator/{id}','IndicatorController@refresh');
Route::put('/indicators/{id}','IndicatorController@update');
Route::delete('/indicators/{id}','IndicatorController@destroy');

//2.4 Beneficios
Route::get('/beneficios/{id}','BeneficioController@index');
Route::get('/beneficios/create/{id}','BeneficioController@create');
Route::get('/beneficios/store/{ids}','BeneficioController@store')->name('beneficio.store');
Route::get('/beneficios/{id}/edit','BeneficioController@edit')->name('beneficio.edit');
Route::put('/beneficios/{id}','BeneficioController@update');
Route::delete('/beneficios/{id}/{indicador}','BeneficioController@destroy');

Route::view('colaboradores','colaboradores.index')->name('colaboradores');
Route::view('colaboradores/create','colaboradores.create')->name('create');//si
Route::view('colaboradores/edit','colaboradores.edit')->name('edit');
Route::resource('colaboradores','ColaboradoresController');
//=======
//1.1 Usuarios
Route::get('/admin/users','UserController@index')->name('users.index');
Route::get('/admin/users/create','UserController@create')->name('users.create');
Route::post('/admin/users/store','UserController@store');
Route::get('/admin/users/{id}/edit','UserController@edit')->name('users.edit');
Route::put('/admin/users/{id}','UserController@update');
Route::delete('/admin/users/{id}','UserController@destroy');


//Productos
Route::view('producto','producto.index')->name('producto');//si
Route::view('producto/create','producto.create')->name('create');//si
Route::resource('producto', 'ProductoController');
Route::view('producto/edit','producto.edit')->name('edit');//si

//Metas
Route::view('metas','metas.index')->name('metas');
Route::view('metas/edit','metas.edit')->name('edit');//si
Route::resource('metas', 'MetaController');

//Actividades
Route::view('actividades','actividades.index')->name('actividades');
Route::view('actividades/edit','actividades.edit')->name('edit');
Route::resource('actividades','ActividadesController');

Route::put('/actividades/update/{id}','ActividadesController@update');

Route::get('/actividades/create/{indicator}','ActividadesController@create');
Route::get('/events/{indicator}','ActividadesController@events');

//Participantes
Route::get('/participantes/{id}','ParticipantesController@index');
Route::get('/participantes/store/{ids}','ParticipantesController@store')->name('participantes.store');
Route::delete('/participantes/{id}/{actividad}','ParticipantesController@destroy');

//Graficas
Route::get('/graficas/generototal','GenerosController@index')->name('genero');
Route::get('/graficas/indicador/{indicador}','GenerosController@indicador');
Route::get('/graficas/actividad/{actividad}','GenerosController@actividad');

//Reportes
//Route::get('ReporteUsuario','ReporteUsuarioController@generar');//si
//Route::get('reporte','reporteController@generar');
Route::get('ReporteProyectosAct','ReporteProyectosActController@generar');
Route::get('reporteProyectoNoAct','reporteProyectoNoActController@generar');
Route::get('reporteActiporProyecto','reporteActiporProyectoController@generar');
Route::get('reporteMetasporProyecto','reporteMetasporProyectoController@generar');
Route::get('reporteParticipantes','reporteParticipantesController@generar');
Route::get('reporteBeneficiario','reporteBeneficiarioController@generar');
Route::get('reporteCantidadGG','reporteCantidadGGController@generar');
Route::get('reporteEstadoIndi','reporteEstadoIndiController@generar');
Route::get('reporteMenorEdad','reporteMenorEdadController@generar');
Route::get('reporteMayorEdad','reporteMayorEdadController@generar');
Route::get('reporteNombreActividad','reporteNombreActividadController@generar');
Route::get('reporteResponsableActividad','reporteResponsableActividadController@generar');
Route::get('reporteParticipantesEvento','reporteParticipantesEventoController@generar');



Route::post('/reportes','reporteController@index')->name('reportes.index');
Route::get('/reportes/generar/{$id}','reporteController@generar')->name('reportes.generar');



// uiKits
Route::view('uikits/alerts', 'uiKits.alerts')->name('alerts');
Route::view('uikits/accordion', 'uiKits.accordion')->name('accordion');
Route::view('uikits/buttons', 'uiKits.buttons')->name('buttons');
Route::view('uikits/badges', 'uiKits.badges')->name('badges');
Route::view('uikits/bootstrap-tab', 'uiKits.bootstrap-tab')->name('bootstrap-tab');
Route::view('uikits/carousel', 'uiKits.carousel')->name('carousel');
Route::view('uikits/collapsible', 'uiKits.collapsible')->name('collapsible');
Route::view('uikits/lists', 'uiKits.lists')->name('lists');
Route::view('uikits/pagination', 'uiKits.pagination')->name('pagination');
Route::view('uikits/popover', 'uiKits.popover')->name('popover');
Route::view('uikits/progressbar', 'uiKits.progressbar')->name('progressbar');
Route::view('uikits/tables', 'uiKits.tables')->name('tables');
Route::view('uikits/tabs', 'uiKits.tabs')->name('tabs');
Route::view('uikits/tooltip', 'uiKits.tooltip')->name('tooltip');
Route::view('uikits/modals', 'uiKits.modals')->name('modals');
Route::view('uikits/NoUislider', 'uiKits.NoUislider')->name('NoUislider');
Route::view('uikits/cards', 'uiKits.cards')->name('cards');
Route::view('uikits/cards-metrics', 'uiKits.cards-metrics')->name('cards-metrics');
Route::view('uikits/typography', 'uiKits.typography')->name('typography');

// extra kits
Route::view('extrakits/dropDown', 'extraKits.dropDown')->name('dropDown');
Route::view('extrakits/imageCroper', 'extraKits.imageCroper')->name('imageCroper');
Route::view('extrakits/loader', 'extraKits.loader')->name('loader');
Route::view('extrakits/laddaButton', 'extraKits.laddaButton')->name('laddaButton');
Route::view('extrakits/toastr', 'extraKits.toastr')->name('toastr');
Route::view('extrakits/sweetAlert', 'extraKits.sweetAlert')->name('sweetAlert');
Route::view('extrakits/tour', 'extraKits.tour')->name('tour');
Route::view('extrakits/upload', 'extraKits.upload')->name('upload');


// Apps
Route::view('apps/invoice', 'apps.invoice')->name('invoice');
Route::view('apps/inbox', 'apps.inbox')->name('inbox');
Route::view('apps/chat', 'apps.chat')->name('chat');
Route::view('apps/calendar', 'apps.calendar')->name('calendar');
Route::view('apps/task-manager-list', 'apps.task-manager-list')->name('task-manager-list');
Route::view('apps/task-manager', 'apps.task-manager')->name('task-manager');
Route::view('apps/toDo', 'apps.toDo')->name('toDo');
Route::view('apps/ecommerce/products', 'apps.ecommerce.products')->name('ecommerce-products');
Route::view('apps/ecommerce/product-details', 'apps.ecommerce.product-details')->name('ecommerce-product-details');
Route::view('apps/ecommerce/cart', 'apps.ecommerce.cart')->name('ecommerce-cart');
Route::view('apps/ecommerce/checkout', 'apps.ecommerce.checkout')->name('ecommerce-checkout');


Route::view('apps/contacts/lists', 'apps.contacts.lists')->name('contacts-lists');
Route::view('apps/contacts/contact-details', 'apps.contacts.contact-details')->name('contact-details');
Route::view('apps/contacts/grid', 'apps.contacts.grid')->name('contacts-grid');

// forms
Route::view('forms/basic-action-bar', 'forms.basic-action-bar')->name('basic-action-bar');
Route::view('forms/multi-column-forms', 'forms.multi-column-forms')->name('multi-column-forms');
Route::view('forms/smartWizard', 'forms.smartWizard')->name('smartWizard');
Route::view('forms/tagInput', 'forms.tagInput')->name('tagInput');
Route::view('forms/forms-basic', 'forms.forms-basic')->name('forms-basic');
Route::view('forms/form-layouts', 'forms.form-layouts')->name('form-layouts');
Route::view('forms/form-input-group', 'forms.form-input-group')->name('form-input-group');
Route::view('forms/form-validation', 'forms.form-validation')->name('form-validation');
Route::view('forms/form-editor', 'forms.form-editor')->name('form-editor');

// Charts
Route::view('charts/echarts', 'charts.echarts')->name('echarts');
Route::view('charts/chartjs', 'charts.chartjs')->name('chartjs');
Route::view('charts/apexLineCharts', 'charts.apexLineCharts')->name('apexLineCharts');
Route::view('charts/apexAreaCharts', 'charts.apexAreaCharts')->name('apexAreaCharts');
Route::view('charts/apexBarCharts', 'charts.apexBarCharts')->name('apexBarCharts');
Route::view('charts/apexColumnCharts', 'charts.apexColumnCharts')->name('apexColumnCharts');
Route::view('charts/apexRadialBarCharts', 'charts.apexRadialBarCharts')->name('apexRadialBarCharts');
Route::view('charts/apexRadarCharts', 'charts.apexRadarCharts')->name('apexRadarCharts');
Route::view('charts/apexPieDonutCharts', 'charts.apexPieDonutCharts')->name('apexPieDonutCharts');
Route::view('charts/apexSparklineCharts', 'charts.apexSparklineCharts')->name('apexSparklineCharts');
Route::view('charts/apexScatterCharts', 'charts.apexScatterCharts')->name('apexScatterCharts');
Route::view('charts/apexBubbleCharts', 'charts.apexBubbleCharts')->name('apexBubbleCharts');
Route::view('charts/apexCandleStickCharts', 'charts.apexCandleStickCharts')->name('apexCandleStickCharts');
Route::view('charts/apexMixCharts', 'charts.apexMixCharts')->name('apexMixCharts');

// datatables
Route::view('datatables/basic-tables', 'datatables.basic-tables')->name('basic-tables');

// sessions
Route::view('sessions/signIn', 'sessions.signIn')->name('signIn');
Route::view('sessions/signUp', 'sessions.signUp')->name('signUp');
Route::view('sessions/forgot', 'sessions.forgot')->name('forgot');

// widgets
Route::view('widgets/card', 'widgets.card')->name('widget-card');
Route::view('widgets/statistics', 'widgets.statistics')->name('widget-statistics');
Route::view('widgets/list', 'widgets.list')->name('widget-list');
Route::view('widgets/app', 'widgets.app')->name('widget-app');
Route::view('widgets/weather-app', 'widgets.weather-app')->name('widget-weather-app');

// others
Route::view('others/notFound', 'others.notFound')->name('notFound');
Route::view('others/user-profile', 'others.user-profile')->name('user-profile');
Route::view('others/starter', 'starter')->name('starter');
Route::view('others/faq', 'others.faq')->name('faq');
Route::view('others/pricing-table', 'others.pricing-table')->name('pricing-table');
Route::view('others/search-result', 'others.search-result')->name('search-result');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
