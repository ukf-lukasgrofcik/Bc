<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student;
use App\Http\Controllers\Company;
use App\Http\Controllers;

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

Route::get('/temporary-route/xxx', function(){
    invite_user("Lukáš Grofčík", "test@mail.com", "employee");
});

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::middleware(['auth'])->group(function (){

    Route::get('/profile', [Controllers\UserSettingsController::class, 'profile'])->name('settings.profile');
    Route::post('/profile', [Controllers\UserSettingsController::class, 'update'])->name('settings.update');
    Route::get('/password', [Controllers\UserSettingsController::class, 'password'])->name('settings.password');
    Route::post('/password', [Controllers\UserSettingsController::class, 'password_update'])->name('settings.password_update');

    Route::middleware(['clearance:student'])->group(function (){
        Route::get('/internship', [Student\InternshipController::class, 'internship'])->name('student.internship');
        Route::get('/internship/create', [Student\InternshipController::class, 'create'])->name('student.internship.create');
        Route::post('/internship/create', [Student\InternshipController::class, 'store'])->name('student.internship.store');
        Route::get('/internship/ajax/study-programme', [Student\InternshipController::class, 'ajax_study_programme'])->name('student.internship.ajax.study_programme');
        Route::post('/internship/company-invite', [Student\InternshipController::class, 'company_invite'])->name('student.company.invite');

        Route::get('/internship/{internship}/entries/create', [Student\EntriesController::class, 'create'])->name('student.internship.entries.create');
        Route::post('/internship/{internship}/entries/create', [Student\EntriesController::class, 'store'])->name('student.internship.entries.store');
        Route::get('/internship/{internship}/entries/{entry}', [Student\EntriesController::class, 'edit'])->name('student.internship.entries.edit');
        Route::post('/internship/{internship}/entries/{entry}', [Student\EntriesController::class, 'update'])->name('student.internship.entries.update');
        Route::post('/internship/{internship}/entries/{entry}/delete', [Student\EntriesController::class, 'delete'])->name('student.internship.entries.delete');

    });

    Route::middleware(['clearance:student,lecturer'])->group(function (){
        // Student/Admin shared routes
        Route::get('/internship/{internship}/comments', [Student\CommentsController::class, 'index'])->name('student.internship.comments');
        Route::post('/internship/{internship}/comments', [Student\CommentsController::class, 'store'])->name('student.internship.comments.store');
        Route::get('/internship/{internship}/entries', [Student\EntriesController::class, 'index'])->name('student.internship.entries.index');
    });

    Route::middleware(['clearance:employee'])->group(function (){
        // Internships
        Route::get('/company/internships', [Company\InternshipsController::class, 'internships'])->name('company.internships');

        Route::middleware(['clearance:owner'])->group(function (){
            // Internships
            Route::get('/company/internships/{internship}/assign', [Company\InternshipsController::class, 'assign_employee'])->name('company.internships.assign_employee');
            Route::post('/company/internships/{internship}/assign', [Company\InternshipsController::class, 'assign'])->name('company.internships.assign');

            // Users
            Route::get('/company/employees', [Company\EmployeesController::class, 'index'])->name('company.employees.index');
            Route::get('/company/employees/create', [Company\EmployeesController::class, 'create'])->name('company.employees.create');
            Route::post('/company/employees/create', [Company\EmployeesController::class, 'store'])->name('company.employees.store');
        });
    });

    Route::middleware(['clearance:lecturer'])->group(function (){
        // Users
        Route::get('/users', [Controllers\UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [Controllers\UsersController::class, 'create'])->name('users.create');
        Route::post('/users/create', [Controllers\UsersController::class, 'store'])->name('users.store');

        // Workplaces
        Route::get('/workplaces', [Controllers\WorkplacesController::class, 'index'])->name('workplaces.index');
        Route::middleware(['clearance:admin'])->group(function (){
            Route::get('/workplaces/create', [Controllers\WorkplacesController::class, 'create'])->name('workplaces.create');
            Route::post('/workplaces/create', [Controllers\WorkplacesController::class, 'store'])->name('workplaces.store');
            Route::get('/workplaces/edit/{workplace}', [Controllers\WorkplacesController::class, 'edit'])->name('workplaces.edit');
            Route::post('/workplaces/edit/{workplace}', [Controllers\WorkplacesController::class, 'update'])->name('workplaces.update');
            Route::post('/workplaces/delete/{workplace}', [Controllers\WorkplacesController::class, 'delete'])->name('workplaces.delete');
        });

        // Companies
        Route::get('/companies', [Controllers\CompaniesController::class, 'index'])->name('companies.index');
        Route::get('/companies/create', [Controllers\CompaniesController::class, 'create'])->name('companies.create');
        Route::post('/companies/create', [Controllers\CompaniesController::class, 'store'])->name('companies.store');
        Route::get('/companies/edit/{company}', [Controllers\CompaniesController::class, 'edit'])->name('companies.edit');
        Route::post('/companies/edit/{company}', [Controllers\CompaniesController::class, 'update'])->name('companies.update');
        Route::post('/companies/delete/{company}', [Controllers\CompaniesController::class, 'delete'])->name('companies.delete');
        Route::get('/companies/{company}/owner', [Controllers\CompaniesController::class, 'create_owner'])->name('companies.owner.create');
        Route::post('/companies/{company}/owner', [Controllers\CompaniesController::class, 'store_owner'])->name('companies.owner.store');

        // Types
        Route::get('/types', [Controllers\TypesController::class, 'index'])->name('types.index');
        Route::middleware(['clearance:workplace_leader'])->group(function (){
            Route::get('/types/create', [Controllers\TypesController::class, 'create'])->name('types.create');
            Route::post('/types/create', [Controllers\TypesController::class, 'store'])->name('types.store');
            Route::get('/types/edit/{type}', [Controllers\TypesController::class, 'edit'])->name('types.edit');
            Route::post('/types/edit/{type}', [Controllers\TypesController::class, 'update'])->name('types.update');
            Route::post('/types/delete/{type}', [Controllers\TypesController::class, 'delete'])->name('types.delete');
        });

        // Statuses
        Route::get('/statuses', [Controllers\StatusesController::class, 'index'])->name('statuses.index');

        // Internships
        Route::get('/internships', [Controllers\InternshipsController::class, 'index'])->name('internships.index');
        Route::get('/internships/statement/{internship}', [Controllers\InternshipsController::class, 'statement'])->name('internships.statement');
        Route::post('/internships/statement/{internship}', [Controllers\InternshipsController::class, 'statement_upload'])->name('internships.statement.upload');

        // Study programmes
        Route::get('/study-programmes', [Controllers\StudyProgrammesController::class, 'index'])->name('study_programmes.index');
        Route::middleware(['clearance:workplace_leader'])->group(function (){
            Route::get('/study-programmes/create', [Controllers\StudyProgrammesController::class, 'create'])->name('study_programmes.create');
            Route::post('/study-programmes/create', [Controllers\StudyProgrammesController::class, 'store'])->name('study_programmes.store');
            Route::get('/study-programmes/edit/{study_programme}', [Controllers\StudyProgrammesController::class, 'edit'])->name('study_programmes.edit');
            Route::post('/study-programmes/edit/{study_programme}', [Controllers\StudyProgrammesController::class, 'update'])->name('study_programmes.update');
            Route::post('/study-programmes/delete/{study_programme}', [Controllers\StudyProgrammesController::class, 'delete'])->name('study_programmes.delete');
        });

        // Subjects
        Route::get('/subjects', [Controllers\SubjectsController::class, 'index'])->name('subjects.index');
        Route::get('/subjects/create', [Controllers\SubjectsController::class, 'create'])->name('subjects.create');
        Route::post('/subjects/create', [Controllers\SubjectsController::class, 'store'])->name('subjects.store');
        Route::get('/subjects/edit/{subject}', [Controllers\SubjectsController::class, 'edit'])->name('subjects.edit');
        Route::post('/subjects/edit/{subject}', [Controllers\SubjectsController::class, 'update'])->name('subjects.update');
        Route::post('/subjects/delete/{subject}', [Controllers\SubjectsController::class, 'delete'])->name('subjects.delete');

    });

});

\Illuminate\Support\Facades\Auth::routes();
