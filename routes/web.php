<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\GigPurchaseController;
use App\Http\Controllers\ProfileViewsController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\client\ProjectController;
use App\Http\Controllers\admin\ExpertiseController;
use App\Http\Controllers\ProjectProposalController;
use App\Http\Controllers\admin\GigCategoryController;
use App\Http\Controllers\freelancer\GigSaleController;
use App\Http\Controllers\freelancer\FreelancerController;
use App\Http\Controllers\GigPaymentTransactionController;
use App\Http\Controllers\payment\StripePaymentController;
use App\Http\Controllers\freelancer\GigDeliveryController;

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

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/gig/{id}', [HomePageController::class, 'show'])->name('homeGigShow');
Route::get('/projects', [HomePageController::class, 'showProjects'])->name('homeProjectsShow');
Route::get('/downloadHomeProject{attachment}', [HomePageController::class, 'downloadHomeProject'])->name('downloadHomeProject');
Route::get('/gigsShow', [HomePageController::class, 'showGigs'])->name('homeGigsShow');


Route::get('profileView', [ProfileViewsController::class, 'index'])->name('profileView');
Route::put('profileUpdate', [ProfileViewsController::class, 'update'])->name('profileUpdate');
Route::delete('deleteUser', [ProfileViewsController::class, 'deleteUser'])->name('deleteUser');

//  *********** Admin Routes >>>>==== START ===>>

Route::prefix('admin')->middleware(['role:Admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'totalProjects'])->name('adminDashboard');
    Route::get('/pendingProjects', [AdminController::class, 'pendingProjects'])->name('pendingProjects');
    Route::get('/pendingProjectShow/{id}', [AdminController::class, 'pendingProjectShow'])->name('pendingProjectShow');
    Route::get('/pendingProjectsApproved/{id}', [AdminController::class, 'pendingProjectsApproved'])->name('pendingProjectsApproved');
    Route::get('/pendingProjectsCancelled/{id}', [AdminController::class, 'pendingProjectsCancelled'])->name('pendingProjectsCancelled');

    Route::get('/pendingGigs', [AdminController::class, 'pendingGigs'])->name('pendingGigs');
    Route::get('/pendingGigShow/{id}', [AdminController::class, 'pendingGigShow'])->name('pendingGigShow');
    Route::get('/pendingGigsApproved/{id}', [AdminController::class, 'pendingGigsApproved'])->name('pendingGigsApproved');
    Route::get('/pendingGigsCancelled/{id}', [AdminController::class, 'pendingGigsCancelled'])->name('pendingGigsCancelled');


    //    Clients Projects Route
    Route::get('/showClientProjects', [AdminController::class, 'showClientProjects'])->name('showClientProjects');
    Route::get('/showClientProjectsView/{id}', [AdminController::class, 'showClientProjectsView'])->name('showClientProjectsView');
    Route::get('/approved/{id}', [AdminController::class, 'approved'])->name('projectApproved');
    Route::get('/canceled/{id}', [AdminController::class, 'canceled'])->name('projectCanceled');

    //    Freelancer Gigs Route
    Route::get('/showFreelancerGigs', [AdminController::class, 'showFreelancerGigs'])->name('showFreelancerGigs');
    Route::get('/showFreelancerGigsView/{id}', [AdminController::class, 'showFreelancerGigsView'])->name('showFreelancerGigsView');
    Route::get('/gigApproved/{id}', [AdminController::class, 'gigApproved'])->name('gigApproved');
    Route::get('/gigCanceledReason/{id}', [AdminController::class, 'gigCanceledReason'])->name('gigCanceledReason');
    Route::get('/gigCanceled/{id}', [AdminController::class, 'gigCanceled'])->name('gigCanceled');

    Route::get('allUsers', [AdminController::class, 'allUsers'])->name('allUsers');
    Route::delete('/{id}', [AdminController::class, 'deleteUser'])->name('deleteUserbyAdmin');

    Route::get('allFreelancers', [AdminController::class, 'freelancerList'])->name('allFreelancers');
    Route::get('allClients', [AdminController::class, 'clientList'])->name('allClients');

    Route::get('approvedProjects', [AdminController::class, 'approvedProjects'])->name('approvedProjects');
    Route::get('approvedProjectsShow/{id}', [AdminController::class, 'approvedProjectsShow'])->name('approvedProjectsShow');
    Route::get('approvedGigs', [AdminController::class, 'approvedGigs'])->name('approvedGigs');
    Route::get('/approvedGigsShow/{id}', [AdminController::class, 'approvedGigsShow'])->name('approvedGigsShow');

    Route::get('canceledProjects', [AdminController::class, 'canceledProjects'])->name('canceledProjects');
    Route::get('/projectCanceledReason/{id}', [AdminController::class, 'projectCanceledReason'])->name('projectCanceledReason');

    Route::get('canceledProjectShow/{id}', [AdminController::class, 'canceledProjectShow'])->name('canceledProjectShow');

    Route::get('canceledGigs', [AdminController::class, 'canceledGigs'])->name('canceledGigs');
    Route::get('canceledGigsShow/{id}', [AdminController::class, 'canceledGigsShow'])->name('canceledGigsShow');

    // Add Gig Category Route
    Route::resource('gigCategories', GigCategoryController::class);
    Route::resource('gigCategories', GigCategoryController::class)->parameters(['edit' => 'id']);

    // Add Freelancer Skill Route
    Route::resource('skills', SkillController::class);
    Route::resource('skills', SkillController::class)->parameters(['edit' => 'id']);

    // Add Freelancer Expertise Route
    Route::resource('expertises', ExpertiseController::class);
    Route::resource('expertises', ExpertiseController::class)->parameters(['edit' => 'id']);

    Route::get('/totalProjects', [AdminController::class, 'totalProjects']);


});

//  *********** Admin Routes <<<<==== END <<===


//  *********** Client Routes >>>>==== START ===>>

Route::prefix('client')->middleware(['role:Client'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('client.dashboard');
    // })->name('clientDashboard');
    Route::get('/dashboard', [ClientController::class, 'countProjects'])->name('clientDashboard');


    Route::resource('projects', ProjectController::class);

    // Route::get('/showProposal', [ClientController::class, 'showProposal'])->name('showProposal');
    Route::get('/showProposal/{project_id}', [ProjectController::class, 'showProposal'])->name('showProposal');
    Route::get('/proposalList', [ClientController::class, 'index'])->name('proposalList');
    Route::get('/showFullProposal/{proposal_id}', [ProjectProposalController::class, 'showFullProposal'])->name('showFullProposal');
    Route::get('/downloadProposal{attachment}', [ProjectProposalController::class, 'downloadProposal'])->name('downloadProposal');


    // hired freelancer
    Route::get('/showHiredFreelancer/{freelancer_id}/{project_id}', [ProjectController::class, 'hireFreelancer'])->name('showHiredFreelancer');


    Route::get('/gigView', [ClientController::class, 'gigView'])->name('gigView');
    Route::get('/gigShow/{gig_id}', [ClientController::class, 'gigShow'])->name('gigShow');


    // Route::view('/orderDetails','client.gig.gig_purchase.orderDetails');

    Route::get('/gigPayment/{gig_id}', [GigPaymentTransactionController::class, 'create'])->name('gigPayment');
    Route::post('gigPaymentStore/{gig_id}', [GigPaymentTransactionController::class, 'store'])->name('gigPaymentStore');


    // Route::get('gigRequirementsCreate/{gig_id}/req/{o_UID}', [GigPurchaseController::class, 'create'])->name('gigRequirementsCreate');
    Route::post('gigRequirements/{o_UID}', [GigPurchaseController::class, 'store'])->name('gigRequirements');
    Route::get('/downloadDelivery{file}', [GigPurchaseController::class, 'downloadDelivery'])->name('downloadDelivery');

    Route::get('/gigPurchases', [GigPurchaseController::class, 'index'])->name('gigPurchases');
    Route::get('/gigPurchaseView/{purchase_id}', [GigPurchaseController::class, 'show'])->name('gigPurchaseView');
    Route::get('/gigDeliveredView/{purchase_id}', [GigPurchaseController::class, 'deliveredShow'])->name('gigDeliveredView');
    Route::get('/gigCompletedView/{purchase_id}', [GigPurchaseController::class, 'completedShow'])->name('gigCompletedView');
     


    Route::get('approvedClientProjects', [ProjectController::class, 'approvedProjectList'])->name('approvedClientProjects');
    Route::get('/approvedClientProjectShow/{id}', [ProjectController::class, 'approvedProjectListShow'])->name('approvedProjectListShow');
    Route::get('pendinClientProjects', [ProjectController::class, 'pendingProjectList'])->name('pendingClientProjects');
    Route::get('/pendingClientProjectShow/{id}', [ProjectController::class, 'pendingProjectListShow'])->name('pendingProjectListShow');
    Route::get('canceledClientProjects', [ProjectController::class, 'canceledProjectList'])->name('canceledClientProjects');
    Route::get('/canceledClientProjectShow/{id}', [ProjectController::class, 'canceledProjectListShow'])->name('canceledProjectListShow');

});

//  *********** Client Routes <<<<==== END <<===


//  *********** Freelancer Routes >>>>==== START ===>>

Route::prefix('freelancer')->middleware(['role:Freelancer'])->group(function () {

    Route::get('/dashboard', [FreelancerController::class, 'index'])->name('freelancerDashboard');

    Route::get('/create-proposal/{project_id?}', [ProjectProposalController::class, 'create'])->name('create-proposal');

    Route::get('/projectList', [ProjectProposalController::class, 'index'])->name('projectList');
    Route::get('/showProjectList/{project_id?}', [ProjectProposalController::class, 'showProjectList'])->name('showProjectList');

    Route::post('/store-proposal', [ProjectProposalController::class, 'store'])->name('store-proposal');

    Route::get('/downloadProject{attachment}', [ProjectProposalController::class, 'downloadProject'])->name('downloadProject');


    Route::resource('gigs', GigController::class);

    Route::get('/pendingGigsList', [GigController::class, 'pendingGigsList'])->name('pendingGigsList');
    Route::get('/pendingGigsListShow/{id}', [GigController::class, 'pendingGigsListShow'])->name('pendingGigsListShow');

    Route::get('/approvedGigsList', [GigController::class, 'approvedGigsList'])->name('approvedGigsList');
    Route::get('/approvedGigsListShow/{id}', [GigController::class, 'approvedGigsListShow'])->name('approvedGigsListShow');

    Route::get('/canceledGigsList', [GigController::class, 'canceledGigs'])->name('canceledGigsList');
    Route::get('/canceledGigsListShow/{id}', [GigController::class, 'canceledGigsShow'])->name('canceledGigsListShow');


    Route::get('/gigSales', [GigSaleController::class, 'index'])->name('gigSales');
    Route::get('/gigSaleShow/{sale_id}', [GigSaleController::class, 'show'])->name('gigSaleShow');
    Route::get('/gigDeliveredShow/{sale_id}', [GigSaleController::class, 'deliveredShow'])->name('gigDeliveredShow');
    Route::get('/gigCompletedShow/{sale_id}', [GigSaleController::class, 'completedShow'])->name('gigCompletedShow');

    Route::post('/gigDelivery/{sale_id}', [GigDeliveryController::class, 'store'])->name('gigDelivery');

});

//  *********** Freelancer Routes <<<<==== END <<===

require __DIR__ . '/auth.php';