<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*** Start Dashboard ***/
        //Category
        $this->app->bind(
            'App\Repositories\Dashboard\Category\CategoryInterface',
            'App\Repositories\Dashboard\Category\CategoryRepository',
        );

        //ActivityLog
        $this->app->bind(
            'App\Repositories\Dashboard\ActivityLog\ActivityLogInterface',
            'App\Repositories\Dashboard\ActivityLog\ActivityLogRepository',
        );

        //Country
        $this->app->bind(
            'App\Repositories\Dashboard\Country\CountryInterface',
            'App\Repositories\Dashboard\Country\CountryRepository',
        );

        //City
        $this->app->bind(
            'App\Repositories\Dashboard\City\CityInterface',
            'App\Repositories\Dashboard\City\CityRepository',
        );

        //Area
        $this->app->bind(
            'App\Repositories\Dashboard\Area\AreaInterface',
            'App\Repositories\Dashboard\Area\AreaRepository',
        );

        //ContactSource
        $this->app->bind(
            'App\Repositories\Dashboard\ContactSource\ContactSourceInterface',
            'App\Repositories\Dashboard\ContactSource\ContactSourceRepository',
        );

        //Activity
        $this->app->bind(
            'App\Repositories\Dashboard\Activity\ActivityInterface',
            'App\Repositories\Dashboard\Activity\ActivityRepository',
        );

        //SubActivity
        $this->app->bind(
            'App\Repositories\Dashboard\SubActivity\SubActivityInterface',
            'App\Repositories\Dashboard\SubActivity\SubActivityRepository',
        );

        //Service
        $this->app->bind(
            'App\Repositories\Dashboard\Service\ServiceInterface',
            'App\Repositories\Dashboard\Service\ServiceRepository',
        );

        //ContactCategory
        $this->app->bind(
            'App\Repositories\Dashboard\ContactCategory\ContactCategoryInterface',
            'App\Repositories\Dashboard\ContactCategory\ContactCategoryRepository',
        );

        //Industry
        $this->app->bind(
            'App\Repositories\Dashboard\Industry\IndustryInterface',
            'App\Repositories\Dashboard\Industry\IndustryRepository',
        );

        //Major
        $this->app->bind(
            'App\Repositories\Dashboard\Major\MajorInterface',
            'App\Repositories\Dashboard\Major\MajorRepository',
        );

        //JobTitle
        $this->app->bind(
            'App\Repositories\Dashboard\JobTitle\JobTitleInterface',
            'App\Repositories\Dashboard\JobTitle\JobTitleRepository',
        );

        //SavedReply
        $this->app->bind(
            'App\Repositories\Dashboard\SavedReply\SavedReplyInterface',
            'App\Repositories\Dashboard\SavedReply\SavedReplyRepository',
        );

        //Tag
        $this->app->bind(
            'App\Repositories\Dashboard\Tag\TagInterface',
            'App\Repositories\Dashboard\Tag\TagRepository',
        );

        //EmployeeTarget
        $this->app->bind(
            'App\Repositories\Dashboard\EmployeeTarget\EmployeeTargetInterface',
            'App\Repositories\Dashboard\EmployeeTarget\EmployeeTargetRepository',
        );

        //Contact
        $this->app->bind(
            'App\Repositories\Dashboard\Contact\ContactInterface',
            'App\Repositories\Dashboard\Contact\ContactRepository',
        );

        //Customer
        $this->app->bind(
            'App\Repositories\Dashboard\Customer\CustomerInterface',
            'App\Repositories\Dashboard\Customer\CustomerRepository',
        );

        //Meeting
        $this->app->bind(
            'App\Repositories\Dashboard\Meeting\MeetingInterface',
            'App\Repositories\Dashboard\Meeting\MeetingRepository',
        );

        //Campaign
        $this->app->bind(
            'App\Repositories\Dashboard\Campaign\CampaignInterface',
            'App\Repositories\Dashboard\Campaign\CampaignRepository',
        );

        //PointSetting
        $this->app->bind(
            'App\Repositories\Dashboard\PointSetting\PointSettingInterface',
            'App\Repositories\Dashboard\PointSetting\PointSettingRepository',
        );

        //Notification
        $this->app->bind(
            'App\Repositories\Dashboard\Notification\NotificationInterface',
            'App\Repositories\Dashboard\Notification\NotificationRepository',
        );

        //Branch
        $this->app->bind(
            'App\Repositories\Dashboard\Branch\BranchInterface',
            'App\Repositories\Dashboard\Branch\BranchRepository',
        );

        //Department
        $this->app->bind(
            'App\Repositories\Dashboard\Department\DepartmentInterface',
            'App\Repositories\Dashboard\Department\DepartmentRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
