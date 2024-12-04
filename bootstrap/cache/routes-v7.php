<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P0HqfSiosJ98KqJX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/store-landing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.landing',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Piwb53vY2QFeprFV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/campaign_contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DwptI7IAlb3Odu8u',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getCampaigns' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::D5VWWggqAFTUw6nJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getActivities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QUkhM6DPQQNrDei8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getCountries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mu8dCtvx8TK6JoLM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getCities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vbBlhTgZtwt0Kte8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bx3MyIj2j6yutTT2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/updateNationalCustomer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J4O0OtZdCnhIeDKc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8U8NcYqWShIRuv4q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Sam7tfyLrlmQYjBS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rwXaql1vazkTD0If',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UQFrtJWoxNFE1UR5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DGU69sJSYjhOmDlf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NPraAUsSlBC0PuH7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth/update-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TZnff4avjWuCehCh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/branches' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J8KRdp27VtlPhoUQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/referenceData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G3wDzxLgwFFeF1AB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rQCL6zqpfCGUAqlX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K7XerHaTe442xUVi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::We5KXC17zn6k1yC2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TYBDtNTLtlSl3JmL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/contacts-changeStatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sXJd7VRn7xIXgvTM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/contacts-trashed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MH3cYn55IkwHz8dp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ruDyn8x78vuih4fT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pLaaKcvCUFBQlwSn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nfPxbXVOwZ7eL5ml',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-storeParent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::piRp38QQGdyIEcUK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-addInvoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3Q1b2A0u9DxSTfrB',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-addReminder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kCMYPi5CylqV1tvd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-addAttachment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h02VSChbv21t8Xbs',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-marketingRetargetResults' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nUaJPHzljQ6n5rtI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/customers-makePassword' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZjoF5AJaIsTTUKfj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/meetings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SlIVEhIkwY8lLgX6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JJRePyz2hsYbdDdm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/notifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rNytlfWI3uaouptt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BhniCTonmLQfBo3s',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/todayReminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::p2JTf5zjArP7zd4B',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/monthReminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Xo9kc81IywcFOez',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/allNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cghRNq4bo5ty2LvN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/unreadNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jZ1BLXEfVc133zz0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/readNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dOXrLolsjX9QnkZw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/markAsReadNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GBQo1iV0QnaKCwG0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IlTREwHo0jEJLvsY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/meetings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5IntlNYftpWpypWw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/meetingsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZpmiltDtC4iOSFuL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6u17rhMiyUZtcc9N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/contactsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qyLlLQMFRg76PKor',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/employeeSales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wTelQKZvZx1tDVKi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/employeeSalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rT8c5Ix9Pj0dM4JM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/branchSales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KUXErWsVKxqhriEx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/branchSalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ruB8Wj21klaU9AOb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/activitySales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::REuaJRUXtSWy0Zm4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/report/activitySalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::POjiEsDIfBAEqfSP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BYPXJqOBiOsuD5rW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q1BiXT1olJtXGiOC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aa8oKILO76MJkXi8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::msBoylrLyak3hKbT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bG3mFn5g1sif58Zd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/update-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RQWY2Ylzn6lLCmNr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4c0ugpsfr5pxBXgi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0GUiydYHXLVI24Yc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-tickets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mdNEaTuvgg4NSwzw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-tickets/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rBg201O5cD8Tz1oI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-allNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aHQhpWU8TY7KKRPG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-unreadNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tO5F6Q69Mg4WNRqf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-readNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZyHYr0WF7STx15in',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer-markAsReadNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EKwMJ3vpifdyxKQR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/invoice/current' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hp93TsJX6TaMNMlQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/invoice/finished' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gDxEiv2z6pI261Pl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/all-blogs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aIinYVYIOrJrijSl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sendTextMessage-whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nhwNBVOrppWQdPiu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sendTemplateMessage-whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::V4fYIn8V0ZPxYSZN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IZjEHA9AZimL14My',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/migrate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::57hi4xVYwE88PNyi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/db-seed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YfJHw14C3NExJTCn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/migrate-fresh-seed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MwqR8wOZsSoqzh0i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0J0Ma3SqTKs2X4Cz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.tickets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/tickets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.tickets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/profileUpdate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/passwordUpdate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/send-whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HC8OlxAjGwYeyiVU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::X6UvQTsd6nZEenma',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K6DUZLvUpHgOOF4j',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lang/ar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lang.ar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lang/en' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lang.en',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categoryDeleteSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.deleteSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activityLog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activityLog/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'country.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/country/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/city/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'area.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactSource' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactSource/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activity.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/activity/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/subActivity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/subActivity/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'service.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/service/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactCategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactCategory/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/nationality' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/nationality/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/industry' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'industry.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'industry.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/industry/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'industry.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/major' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'major.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'major.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/major/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'major.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/jobTitle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/jobTitle/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/savedReply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/savedReply/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tag' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tag.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tag.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tag/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tag.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employeeTarget' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employeeTarget/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'blog.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'support.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/support/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contact.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactTrashed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.trashed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactDeleteSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.deleteSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactTrashSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.trashSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactActivateSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.activateSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contactRelateSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.relateSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact/export/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.exportView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact/export/data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.exportData',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/meeting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/meeting/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/message' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'message.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/message/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customerMessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.storeCustomerMessage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/storeSingleCustomerMessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.storeSingleCustomerMessage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/storeSingleContactMessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.storeSingleContactMessage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer/invoice/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update.invoice',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer/invoice/cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.cancelInvoice',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customerDeleteSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.deleteSelected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attachments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attachments/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attachment_dt_ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TrbXWcqnvxCQd3sj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/store-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attachments.store.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/delete-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attachments.delete.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/import/fetch.excel/columns' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'import.fetch.excel.columns',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/campaign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/campaign/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reTarget' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reTarget.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/getReTarget' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reTarget.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reTargetSelected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reTarget.selected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pointSetting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pointSetting/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.payments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/paymentsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.paymentsReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/meetings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.meetings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/meetingsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.meetingsReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/contactMeetings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.contactMeetings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/contactMeetingsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.contactMeetingsReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/contacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.contacts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/contactsReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.contactsReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/employeeSales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.employeeSales',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/employeeSalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.employeeSalesReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/branchSales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.branchSales',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/branchSalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.branchSalesReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/activitySales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.activitySales',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/report/activitySalesReport' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'report.activitySalesReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'notification.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/notification/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/todayReminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'todayReminders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monthReminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'monthReminders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/delayReminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delayReminders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/todayFollowUps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'todayFollowUps.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monthFollowUps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'monthFollowUps.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/todayBirthdays' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'todayBirthdays.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tickets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tickets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/whatsapp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/whatsapp-business' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/whatsapp-business/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/branch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'branch.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/branch/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/department/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roleDelete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employeesSelect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employees.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allNotifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'allNotifications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/markAllAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'markAllAsRead',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/updatePaginationCount' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updatePaginationCount',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sendTemplateMessage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sendTemplateMessage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sendWhatsappTwilio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ItlhxZ5opMMpXGnS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/a(?|pi/(?|get(?|SubActivitiesByActivityId/([^/]++)(*:58)|CitiesByCountryId/([^/]++)(*:91))|admin/(?|c(?|ontact(?|s(?|/([^/]++)(?|(*:137))|\\-change(?|Active/([^/]++)(*:172)|Trash/([^/]++)(*:194)|RelateEmployee/([^/]++)(*:225)))|/([^/]++)(*:244))|ustomer(?|s(?|/([^/]++)(?|(*:279))|\\-(?|updateInvoice/([^/]++)(*:315)|deleteAttachment/([^/]++)(*:348)))|/([^/]++)(*:367)))|meetings/([^/]++)(?|(*:397))|notifications/([^/]++)(?|(*:431))|remindersChangeStatus/([^/]++)(*:470)|tickets/(?|([^/]++)(*:497)|changeStatus/([^/]++)(*:526)|assignAgent/([^/]++)(*:554)|replyToTicket/([^/]++)(*:584)))|customer\\-tickets/([^/]++)(?|(*:623)|/reply(*:637))|blog/([^/]++)(*:659)|national/(?|home/([^/]++)(*:692)|invoice/(?|current/([^/]++)(*:727)|finished/([^/]++)(*:752))|update/profile/([^/]++)(*:784))|qrcode/cus(?|tomer/details/([^/]++)(*:828)|ctomer/([^/]++)(*:851)))|dmin/(?|c(?|a(?|tegory(?|/([^/]++)(?|(*:898)|/edit(*:911)|(*:919))|ShowNotification/([^/]++)/([^/]++)(*:962))|mpaign/([^/]++)(?|(*:989)|/edit(*:1002)|(*:1011)))|o(?|untry/([^/]++)(?|(*:1043)|/edit(*:1057)|(*:1066))|ntact(?|Source/([^/]++)(?|(*:1102)|/edit(*:1116)|(*:1125))|Category/([^/]++)(?|(*:1155)|/edit(*:1169)|(*:1178))|/(?|([^/]++)(?|(*:1203)|/edit(*:1217)|(*:1226))|change(?|Active(*:1251)|Trash(*:1265)|Status(*:1280))|relateEmployee(*:1304)|importData(*:1323))))|ity/([^/]++)(?|(*:1350)|/edit(*:1364)|(*:1373))|ustomer/(?|([^/]++)(?|(*:1405)|/edit(*:1419)|(*:1428))|add(?|Invoice(*:1451)|Parent/([^/]++)(*:1475)|Reminder(*:1492)|Attachment(*:1511))|i(?|nvoice/([^/]++)/edit(*:1545)|mport(?|(*:1562)|Data(*:1575)))|storeParent(*:1597)|editReminder(*:1618)|deleteAttachment/([^/]++)(*:1652)|ma(?|rketingRetargetResults(*:1688)|kePassword(*:1707))))|a(?|ctivity(?|Log/([^/]++)(?|(*:1748)|/edit(*:1762)|(*:1771))|/([^/]++)(?|(*:1793)|/edit(*:1807)|(*:1816)))|rea(?|/([^/]++)(?|(*:1845)|/edit(*:1859)|(*:1868))|ByCityId/([^/]++)(*:1895))|ttachments/([^/]++)(?|(*:1927)|/edit(*:1941)|(*:1950)))|s(?|u(?|bActivity(?|/([^/]++)(?|(*:1993)|/edit(*:2007)|(*:2016))|ByActivityId/([^/]++)(*:2047))|pport/([^/]++)(?|(*:2074)|/edit(*:2088)|(*:2097)))|ervice(?|/([^/]++)(?|(*:2129)|/edit(*:2143)|(*:2152))|ByInterestId/([^/]++)(*:2183))|avedReply/([^/]++)(?|(*:2214)|/edit(*:2228)|(*:2237))|how_file/([^/]++)/([^/]++)(*:2273))|n(?|ationality/([^/]++)(?|(*:2309)|/edit(*:2323)|(*:2332))|otification/([^/]++)(?|(*:2365)|/edit(*:2379)|(*:2388)))|in(?|dustry/([^/]++)(?|(*:2422)|/edit(*:2436)|(*:2445))|voice/([^/]++)(*:2469))|m(?|ajor(?|/([^/]++)(?|(*:2502)|/edit(*:2516)|(*:2525))|ByIndustryId/([^/]++)(*:2556))|e(?|eting/([^/]++)(?|(*:2587)|/edit(*:2601)|(*:2610))|ssage/([^/]++)(?|(*:2637)|/edit(*:2651)|(*:2660))))|jobTitle/([^/]++)(?|(*:2692)|/edit(*:2706)|(*:2715))|t(?|ag/([^/]++)(?|(*:2743)|/edit(*:2757)|(*:2766))|ickets/([^/]++)(?|(*:2794)|/(?|edit(*:2811)|change\\-status(*:2834)|assign\\-agent(*:2856)|reply(*:2870))|(*:2880)))|employee(?|Target/([^/]++)(?|(*:2920)|/edit(*:2934)|(*:2943))|By(?|BranchId/([^/]++)(*:2975)|Dept/([^/]++)(*:2997)))|b(?|log/([^/]++)(?|(*:3027)|/edit(*:3041)|(*:3050))|ranch/([^/]++)(?|(*:3077)|/edit(*:3091)|(*:3100)))|r(?|e(?|ceipt/([^/]++)(*:3133)|mindersChangeStatus/([^/]++)(*:3170))|ole/([^/]++)(?|(*:3195)|/edit(*:3209)|(*:3218)))|pointSetting/([^/]++)(?|(*:3253)|/edit(*:3267)|(*:3276))|whatsapp\\-business/([^/]++)(?|(*:3316)|/edit(*:3330)|(*:3339))|d(?|epartment/([^/]++)(?|(*:3374)|/edit(*:3388)|(*:3397))|ownload_file/([^/]++)/([^/]++)(*:3437))|user(?|/(?|edit/([^/]++)(*:3471)|destroy/([^/]++)(*:3496))|ChangeStatus/([^/]++)(*:3527))))|/customer/(?|tickets/(?|([^/]++)(?|(*:3574)|/reply(*:3589))|create(*:3605))|profile/edit/([^/]++)(*:3636)|edit/password/([^/]++)(*:3667))|/password/reset/([^/]++)(*:3701)|/qrcode/customer/([^/]++)(*:3735))/?$}sDu',
    ),
    3 => 
    array (
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wZ57tpb2h7Z5ZIJO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      91 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UwfZLB2u6XuS5V09',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      137 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t1yMdl0aL5EdDh9B',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qMEzIJVbw7Rx3IxL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IHVJbIFrhoLyFqs2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      172 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WNoY0jjz2o0nzfgt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::D2M1imndka6N6gI5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CfNw71rFrR3NwX0t',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NgOAWaAOa8FOoUHf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kZSKQndglMusnmPF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RojICqu0phmSijRj',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dbjVsuZKrbiBoMtn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      315 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7IDAKtjjvWlMU7r5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8PNrRDY3nLgMFKsx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UPhSQKCtM9EcB2IE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::51Da9IQ3LC8fo1YB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nbrrb79WGiru8xSs',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nx90MTsJeR1rPD56',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      431 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iSucXc00Jq0wt8ct',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZZnu0iUtthSS8kVg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::f437CF5lOqtoRgkx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q6tMgNyMxSQnMEGj',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      497 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CpwqAxOiDDy1tHKF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      526 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i0vyiVvLPnbVTN97',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      554 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PmPQIAOFzCrOmw0a',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LTo38GfiRDQe9hpj',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VCFTiPU7ZrqH08Tk',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cNyJvOWkLotWL9ZB',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9bKjCMjSsXxfsPrk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      692 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MTww5HUTS5kaeBBm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      727 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wssitqozuSGW9fk7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      752 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::65SgKiJwgcfBNi3Z',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      784 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F7R9eo7JEuUncHfL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qr.customer.show.details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      851 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.qr.customer.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'category.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      962 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.showNotification',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'notification_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.show',
          ),
          1 => 
          array (
            0 => 'campaign',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1002 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.edit',
          ),
          1 => 
          array (
            0 => 'campaign',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1011 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.update',
          ),
          1 => 
          array (
            0 => 'campaign',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'campaign.destroy',
          ),
          1 => 
          array (
            0 => 'campaign',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1043 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.show',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.edit',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1066 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'country.update',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'country.destroy',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.show',
          ),
          1 => 
          array (
            0 => 'contactSource',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.edit',
          ),
          1 => 
          array (
            0 => 'contactSource',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.update',
          ),
          1 => 
          array (
            0 => 'contactSource',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contactSource.destroy',
          ),
          1 => 
          array (
            0 => 'contactSource',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.show',
          ),
          1 => 
          array (
            0 => 'contactCategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.edit',
          ),
          1 => 
          array (
            0 => 'contactCategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.update',
          ),
          1 => 
          array (
            0 => 'contactCategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contactCategory.destroy',
          ),
          1 => 
          array (
            0 => 'contactCategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.show',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.edit',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1226 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.update',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contact.destroy',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1251 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.changeActive',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.changeTrash',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1280 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.changeStatus',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.relateEmployee',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact.importData',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1350 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1364 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.edit',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1405 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.show',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.edit',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1428 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.update',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'customer.destroy',
          ),
          1 => 
          array (
            0 => 'customer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1451 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.addInvoice',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.addParent',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1492 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.addReminder',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.addAttachment',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1545 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.edit.invoice',
          ),
          1 => 
          array (
            0 => 'invoice_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1562 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.import',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.importData',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1597 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.storeParent',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.editReminder',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1652 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.deleteAttachment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.marketingPostRetargetResults',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.makePassword',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.show',
          ),
          1 => 
          array (
            0 => 'activityLog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1762 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.edit',
          ),
          1 => 
          array (
            0 => 'activityLog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1771 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.update',
          ),
          1 => 
          array (
            0 => 'activityLog',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activityLog.destroy',
          ),
          1 => 
          array (
            0 => 'activityLog',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity.show',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1807 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity.edit',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1816 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity.update',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'activity.destroy',
          ),
          1 => 
          array (
            0 => 'activity',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.show',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.edit',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1868 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.update',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'area.destroy',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1895 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pzRuYQaWCZ7vYSvg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1927 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.show',
          ),
          1 => 
          array (
            0 => 'attachment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.edit',
          ),
          1 => 
          array (
            0 => 'attachment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.update',
          ),
          1 => 
          array (
            0 => 'attachment',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attachments.destroy',
          ),
          1 => 
          array (
            0 => 'attachment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1993 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.show',
          ),
          1 => 
          array (
            0 => 'subActivity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.edit',
          ),
          1 => 
          array (
            0 => 'subActivity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2016 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.update',
          ),
          1 => 
          array (
            0 => 'subActivity',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'subActivity.destroy',
          ),
          1 => 
          array (
            0 => 'subActivity',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2047 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5prKaEI45mk71NQu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.show',
          ),
          1 => 
          array (
            0 => 'support',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2088 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.edit',
          ),
          1 => 
          array (
            0 => 'support',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'support.update',
          ),
          1 => 
          array (
            0 => 'support',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'support.destroy',
          ),
          1 => 
          array (
            0 => 'support',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service.show',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2143 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service.edit',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service.update',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'service.destroy',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2183 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Japhm4p66hhv2ZT1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2214 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.show',
          ),
          1 => 
          array (
            0 => 'savedReply',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.edit',
          ),
          1 => 
          array (
            0 => 'savedReply',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2237 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.update',
          ),
          1 => 
          array (
            0 => 'savedReply',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'savedReply.destroy',
          ),
          1 => 
          array (
            0 => 'savedReply',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2273 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show_file',
          ),
          1 => 
          array (
            0 => 'folder_name',
            1 => 'photo_name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.show',
          ),
          1 => 
          array (
            0 => 'nationality',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.edit',
          ),
          1 => 
          array (
            0 => 'nationality',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.update',
          ),
          1 => 
          array (
            0 => 'nationality',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'nationality.destroy',
          ),
          1 => 
          array (
            0 => 'nationality',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.show',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.edit',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notification.update',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'notification.destroy',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2422 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'industry.show',
          ),
          1 => 
          array (
            0 => 'industry',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'industry.edit',
          ),
          1 => 
          array (
            0 => 'industry',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'industry.update',
          ),
          1 => 
          array (
            0 => 'industry',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'industry.destroy',
          ),
          1 => 
          array (
            0 => 'industry',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.index',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'major.show',
          ),
          1 => 
          array (
            0 => 'major',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2516 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'major.edit',
          ),
          1 => 
          array (
            0 => 'major',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'major.update',
          ),
          1 => 
          array (
            0 => 'major',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'major.destroy',
          ),
          1 => 
          array (
            0 => 'major',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2556 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yySE9MgB6B2gM7Ah',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.show',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2601 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.edit',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.update',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'meeting.destroy',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.show',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.edit',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2660 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'message.update',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'message.destroy',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2692 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.show',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2706 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.edit',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2715 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.update',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'jobTitle.destroy',
          ),
          1 => 
          array (
            0 => 'jobTitle',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tag.show',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tag.edit',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2766 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tag.update',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tag.destroy',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2794 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.show',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.edit',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2834 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ticket.status.change',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2856 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ticket.assign.agent',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2870 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ticket.reply',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2880 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.update',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tickets.destroy',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2920 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.show',
          ),
          1 => 
          array (
            0 => 'employeeTarget',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.edit',
          ),
          1 => 
          array (
            0 => 'employeeTarget',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.update',
          ),
          1 => 
          array (
            0 => 'employeeTarget',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'employeeTarget.destroy',
          ),
          1 => 
          array (
            0 => 'employeeTarget',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2975 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::03TqTpxIiiQVsh5k',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2997 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::feGYe97NpdBwDF9E',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3027 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.show',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3041 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.edit',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3050 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.update',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'blog.destroy',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3077 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.show',
          ),
          1 => 
          array (
            0 => 'branch',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3091 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.edit',
          ),
          1 => 
          array (
            0 => 'branch',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'branch.update',
          ),
          1 => 
          array (
            0 => 'branch',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'branch.destroy',
          ),
          1 => 
          array (
            0 => 'branch',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receipt.index',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3170 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reminder.changeStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3195 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3218 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'role.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3253 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.show',
          ),
          1 => 
          array (
            0 => 'pointSetting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.edit',
          ),
          1 => 
          array (
            0 => 'pointSetting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.update',
          ),
          1 => 
          array (
            0 => 'pointSetting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'pointSetting.destroy',
          ),
          1 => 
          array (
            0 => 'pointSetting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.show',
          ),
          1 => 
          array (
            0 => 'whatsapp_business',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.edit',
          ),
          1 => 
          array (
            0 => 'whatsapp_business',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.update',
          ),
          1 => 
          array (
            0 => 'whatsapp_business',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'whatsapp-business.destroy',
          ),
          1 => 
          array (
            0 => 'whatsapp_business',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.show',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.edit',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'department.update',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'department.destroy',
          ),
          1 => 
          array (
            0 => 'department',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'download_file',
          ),
          1 => 
          array (
            0 => 'folder_name',
            1 => 'photo_name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3471 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.changeStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.tickets.show',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.ticket.reply',
          ),
          1 => 
          array (
            0 => 'ticket',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'customer.tickets.store',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3636 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3667 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qr.customer.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::P0HqfSiosJ98KqJX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::P0HqfSiosJ98KqJX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'store.landing' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/store-landing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ExternalController@storeContact',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ExternalController@storeContact',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'store.landing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Piwb53vY2QFeprFV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FileController@upload',
        'controller' => 'App\\Http\\Controllers\\Api\\FileController@upload',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Piwb53vY2QFeprFV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DwptI7IAlb3Odu8u' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/campaign_contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@campaignContact',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@campaignContact',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DwptI7IAlb3Odu8u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::D5VWWggqAFTUw6nJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getCampaigns',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getCampaigns',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getCampaigns',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::D5VWWggqAFTUw6nJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QUkhM6DPQQNrDei8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getActivities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getActivities',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getActivities',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QUkhM6DPQQNrDei8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wZ57tpb2h7Z5ZIJO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getSubActivitiesByActivityId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getSubActivitiesByActivityId',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getSubActivitiesByActivityId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wZ57tpb2h7Z5ZIJO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mu8dCtvx8TK6JoLM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getCountries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getCountries',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getCountries',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mu8dCtvx8TK6JoLM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vbBlhTgZtwt0Kte8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getCities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getCities',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getCities',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::vbBlhTgZtwt0Kte8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UwfZLB2u6XuS5V09' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getCitiesByCountryId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MarketingController@getCitiesByCountryId',
        'controller' => 'App\\Http\\Controllers\\Api\\MarketingController@getCitiesByCountryId',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UwfZLB2u6XuS5V09',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bx3MyIj2j6yutTT2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bx3MyIj2j6yutTT2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J4O0OtZdCnhIeDKc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/updateNationalCustomer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@updateNationalCustomer',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@updateNationalCustomer',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::J4O0OtZdCnhIeDKc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8U8NcYqWShIRuv4q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/auth/me',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@me',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@me',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::8U8NcYqWShIRuv4q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Sam7tfyLrlmQYjBS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@register',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::Sam7tfyLrlmQYjBS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rwXaql1vazkTD0If' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::rwXaql1vazkTD0If',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UQFrtJWoxNFE1UR5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::UQFrtJWoxNFE1UR5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DGU69sJSYjhOmDlf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@refresh',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@refresh',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::DGU69sJSYjhOmDlf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NPraAUsSlBC0PuH7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@changePassword',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@changePassword',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::NPraAUsSlBC0PuH7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TZnff4avjWuCehCh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/auth/update-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\AuthController@updateProfile',
        'namespace' => NULL,
        'prefix' => 'api/admin/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::TZnff4avjWuCehCh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J8KRdp27VtlPhoUQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/branches',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReferenceDataController@getBranches',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReferenceDataController@getBranches',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::J8KRdp27VtlPhoUQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G3wDzxLgwFFeF1AB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/referenceData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReferenceDataController@referenceData',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReferenceDataController@referenceData',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::G3wDzxLgwFFeF1AB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rQCL6zqpfCGUAqlX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\HomeController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::rQCL6zqpfCGUAqlX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K7XerHaTe442xUVi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::K7XerHaTe442xUVi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t1yMdl0aL5EdDh9B' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contacts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::t1yMdl0aL5EdDh9B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TYBDtNTLtlSl3JmL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@create',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TYBDtNTLtlSl3JmL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::We5KXC17zn6k1yC2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::We5KXC17zn6k1yC2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NgOAWaAOa8FOoUHf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contact/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@edit',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@edit',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::NgOAWaAOa8FOoUHf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qMEzIJVbw7Rx3IxL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/contacts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qMEzIJVbw7Rx3IxL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IHVJbIFrhoLyFqs2' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/contacts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IHVJbIFrhoLyFqs2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WNoY0jjz2o0nzfgt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contacts-changeActive/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeActive',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeActive',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::WNoY0jjz2o0nzfgt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::D2M1imndka6N6gI5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contacts-changeTrash/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeTrash',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeTrash',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::D2M1imndka6N6gI5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CfNw71rFrR3NwX0t' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/contacts-changeRelateEmployee/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeRelateEmployee',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeRelateEmployee',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::CfNw71rFrR3NwX0t',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sXJd7VRn7xIXgvTM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/contacts-changeStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::sXJd7VRn7xIXgvTM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MH3cYn55IkwHz8dp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/contacts-trashed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@trashed',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ContactController@trashed',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MH3cYn55IkwHz8dp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ruDyn8x78vuih4fT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ruDyn8x78vuih4fT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kZSKQndglMusnmPF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/customers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kZSKQndglMusnmPF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nfPxbXVOwZ7eL5ml' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@create',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::nfPxbXVOwZ7eL5ml',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pLaaKcvCUFBQlwSn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::pLaaKcvCUFBQlwSn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UPhSQKCtM9EcB2IE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/customer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@edit',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::UPhSQKCtM9EcB2IE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RojICqu0phmSijRj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RojICqu0phmSijRj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dbjVsuZKrbiBoMtn' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/customers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::dbjVsuZKrbiBoMtn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::piRp38QQGdyIEcUK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-storeParent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@storeParent',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@storeParent',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::piRp38QQGdyIEcUK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3Q1b2A0u9DxSTfrB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-addInvoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addInvoice',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addInvoice',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::3Q1b2A0u9DxSTfrB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7IDAKtjjvWlMU7r5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-updateInvoice/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@updateInvoice',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@updateInvoice',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7IDAKtjjvWlMU7r5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kCMYPi5CylqV1tvd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-addReminder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addReminder',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addReminder',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kCMYPi5CylqV1tvd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::h02VSChbv21t8Xbs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-addAttachment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addAttachment',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@addAttachment',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::h02VSChbv21t8Xbs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8PNrRDY3nLgMFKsx' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/customers-deleteAttachment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@deleteAttachment',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@deleteAttachment',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::8PNrRDY3nLgMFKsx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nUaJPHzljQ6n5rtI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-marketingRetargetResults',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@postRetargetResults',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@postRetargetResults',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::nUaJPHzljQ6n5rtI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZjoF5AJaIsTTUKfj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/customers-makePassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@makePassword',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\CustomerController@makePassword',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ZjoF5AJaIsTTUKfj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SlIVEhIkwY8lLgX6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/meetings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::SlIVEhIkwY8lLgX6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::51Da9IQ3LC8fo1YB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/meetings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::51Da9IQ3LC8fo1YB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JJRePyz2hsYbdDdm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/meetings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::JJRePyz2hsYbdDdm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nbrrb79WGiru8xSs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/meetings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Nbrrb79WGiru8xSs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nx90MTsJeR1rPD56' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/meetings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\MeetingController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Nx90MTsJeR1rPD56',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rNytlfWI3uaouptt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/notifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::rNytlfWI3uaouptt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iSucXc00Jq0wt8ct' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/notifications/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::iSucXc00Jq0wt8ct',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BhniCTonmLQfBo3s' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::BhniCTonmLQfBo3s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZZnu0iUtthSS8kVg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notifications/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ZZnu0iUtthSS8kVg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::f437CF5lOqtoRgkx' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/admin/notifications/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::f437CF5lOqtoRgkx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::p2JTf5zjArP7zd4B' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/todayReminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@todayReminders',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@todayReminders',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::p2JTf5zjArP7zd4B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Xo9kc81IywcFOez' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/monthReminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@monthReminders',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@monthReminders',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7Xo9kc81IywcFOez',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q6tMgNyMxSQnMEGj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/remindersChangeStatus/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@remindersChangeStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@remindersChangeStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Q6tMgNyMxSQnMEGj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cghRNq4bo5ty2LvN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/allNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@allNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@allNotifications',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::cghRNq4bo5ty2LvN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jZ1BLXEfVc133zz0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/unreadNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@unreadNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@unreadNotifications',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::jZ1BLXEfVc133zz0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dOXrLolsjX9QnkZw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/readNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@readNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@readNotifications',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::dOXrLolsjX9QnkZw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GBQo1iV0QnaKCwG0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/markAsReadNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@markAsReadNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\NotificationController@markAsReadNotifications',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::GBQo1iV0QnaKCwG0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IlTREwHo0jEJLvsY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IlTREwHo0jEJLvsY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CpwqAxOiDDy1tHKF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/tickets/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::CpwqAxOiDDy1tHKF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i0vyiVvLPnbVTN97' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/tickets/changeStatus/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::i0vyiVvLPnbVTN97',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PmPQIAOFzCrOmw0a' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/tickets/assignAgent/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@assignAgent',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@assignAgent',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::PmPQIAOFzCrOmw0a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LTo38GfiRDQe9hpj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/tickets/replyToTicket/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@replyToTicket',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\TicketController@replyToTicket',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::LTo38GfiRDQe9hpj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5IntlNYftpWpypWw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/meetings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@meetings',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@meetings',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::5IntlNYftpWpypWw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZpmiltDtC4iOSFuL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/meetingsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@meetingsReport',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@meetingsReport',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ZpmiltDtC4iOSFuL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6u17rhMiyUZtcc9N' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@contacts',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@contacts',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::6u17rhMiyUZtcc9N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qyLlLQMFRg76PKor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/contactsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@contactsReport',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@contactsReport',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qyLlLQMFRg76PKor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wTelQKZvZx1tDVKi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/employeeSales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@employeeSales',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@employeeSales',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::wTelQKZvZx1tDVKi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rT8c5Ix9Pj0dM4JM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/employeeSalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@employeeSalesReport',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@employeeSalesReport',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::rT8c5Ix9Pj0dM4JM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KUXErWsVKxqhriEx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/branchSales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@branchSales',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@branchSales',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::KUXErWsVKxqhriEx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ruB8Wj21klaU9AOb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/branchSalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@branchSalesReport',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@branchSalesReport',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ruB8Wj21klaU9AOb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::REuaJRUXtSWy0Zm4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/activitySales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@activitySales',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@activitySales',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::REuaJRUXtSWy0Zm4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::POjiEsDIfBAEqfSP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/report/activitySalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwtMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@activitySalesReport',
        'controller' => 'App\\Http\\Controllers\\Api\\Admin\\ReportController@activitySalesReport',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::POjiEsDIfBAEqfSP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BYPXJqOBiOsuD5rW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@register',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::BYPXJqOBiOsuD5rW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q1BiXT1olJtXGiOC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::Q1BiXT1olJtXGiOC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aa8oKILO76MJkXi8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::aa8oKILO76MJkXi8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::msBoylrLyak3hKbT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@refresh',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@refresh',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::msBoylrLyak3hKbT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bG3mFn5g1sif58Zd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@changePassword',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@changePassword',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::bG3mFn5g1sif58Zd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RQWY2Ylzn6lLCmNr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/update-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\AuthController@updateProfile',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::RQWY2Ylzn6lLCmNr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4c0ugpsfr5pxBXgi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@home',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@home',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4c0ugpsfr5pxBXgi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0GUiydYHXLVI24Yc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@tickets',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@tickets',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0GUiydYHXLVI24Yc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mdNEaTuvgg4NSwzw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-tickets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@createTicket',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@createTicket',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mdNEaTuvgg4NSwzw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rBg201O5cD8Tz1oI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer-tickets/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@storeTicket',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@storeTicket',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rBg201O5cD8Tz1oI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VCFTiPU7ZrqH08Tk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-tickets/{ticket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@showTicket',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@showTicket',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VCFTiPU7ZrqH08Tk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cNyJvOWkLotWL9ZB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer-tickets/{ticket}/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@replyTicket',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\CustomerController@replyTicket',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::cNyJvOWkLotWL9ZB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aHQhpWU8TY7KKRPG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-allNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@allNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@allNotifications',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aHQhpWU8TY7KKRPG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tO5F6Q69Mg4WNRqf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-unreadNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@unreadNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@unreadNotifications',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::tO5F6Q69Mg4WNRqf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZyHYr0WF7STx15in' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-readNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@readNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@readNotifications',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ZyHYr0WF7STx15in',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EKwMJ3vpifdyxKQR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer-markAsReadNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@markAsReadNotifications',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NotificationController@markAsReadNotifications',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EKwMJ3vpifdyxKQR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hp93TsJX6TaMNMlQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/invoice/current',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\InvoicesController@current',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\InvoicesController@current',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hp93TsJX6TaMNMlQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gDxEiv2z6pI261Pl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/invoice/finished',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:customer_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\InvoicesController@finished',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\InvoicesController@finished',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gDxEiv2z6pI261Pl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aIinYVYIOrJrijSl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/all-blogs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Blog\\BlogController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Blog\\BlogController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aIinYVYIOrJrijSl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9bKjCMjSsXxfsPrk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/blog/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Blog\\BlogController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\Blog\\BlogController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9bKjCMjSsXxfsPrk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MTww5HUTS5kaeBBm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/national/home/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@home',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@home',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MTww5HUTS5kaeBBm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wssitqozuSGW9fk7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/national/invoice/current/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@currentInvoices',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@currentInvoices',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wssitqozuSGW9fk7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::65SgKiJwgcfBNi3Z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/national/invoice/finished/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@finishedInvoices',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@finishedInvoices',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::65SgKiJwgcfBNi3Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F7R9eo7JEuUncHfL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/national/update/profile/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\Customer\\NationalAppController@updateProfile',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::F7R9eo7JEuUncHfL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nhwNBVOrppWQdPiu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sendTextMessage-whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppController@sendTextMessage',
        'controller' => 'App\\Http\\Controllers\\WhatsAppController@sendTextMessage',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::nhwNBVOrppWQdPiu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::V4fYIn8V0ZPxYSZN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sendTemplateMessage-whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppController@sendTemplateMessage',
        'controller' => 'App\\Http\\Controllers\\WhatsAppController@sendTemplateMessage',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::V4fYIn8V0ZPxYSZN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IZjEHA9AZimL14My' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:593:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:374:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:cache\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'route:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'migrate\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'permission:cache-reset\');
    return "Cache Cleared Successfully";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006b40000000000000000";}";s:4:"hash";s:44:"vH4zoWWNqvhY1/R+N/KhY0vSr0FPOTxj9QTEAWw9ljE=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IZjEHA9AZimL14My',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::57hi4xVYwE88PNyi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'migrate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:332:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:113:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'migrate\');
    return "Migrate Done Successfully";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006b60000000000000000";}";s:4:"hash";s:44:"pzQl40+KHL3Fd+Vx8mlbq0By8rdgld1p8dduoHlGQmM=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::57hi4xVYwE88PNyi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YfJHw14C3NExJTCn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'db-seed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:332:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:113:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'db:seed\');
    return "DB Seed Done Successfully";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006b80000000000000000";}";s:4:"hash";s:44:"q9IaPUANEyvIyJuq+w988IlJWjm2rHsLawrJ6IVEuNA=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YfJHw14C3NExJTCn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MwqR8wOZsSoqzh0i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'migrate-fresh-seed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:356:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:137:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'migrate:fresh --seed\');
    return "Migrate Fresh Seed Done Successfully";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006ba0000000000000000";}";s:4:"hash";s:44:"Oh8HQ+bGuh0mrU7soIkkHMRX3Z5FQ/AgINzzjeioFt4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MwqR8wOZsSoqzh0i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:265:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
    return \\view(\'auth.login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000006cc0000000000000000";}";s:4:"hash";s:44:"gGHNlub0Eplekrxn9I1tsbQVeYHFj/eEYFfD9Z0JpD8=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:customer',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\AuthController@showLoginForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'customer.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0J0Ma3SqTKs2X4Cz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0J0Ma3SqTKs2X4Cz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@home',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@home',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.tickets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@tickets',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@tickets',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.tickets',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.tickets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/tickets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@showCreateTicket',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@showCreateTicket',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.tickets.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.tickets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/tickets/{ticket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@showTicket',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@showTicket',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.tickets.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.ticket.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/tickets/{ticket}/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@postReply',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@postReply',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.ticket.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.tickets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'customer/tickets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerPortalController@storeTicket',
        'controller' => 'App\\Http\\Controllers\\CustomerPortalController@storeTicket',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'customer.tickets.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/profile/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\CustomerProfileController@edit',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'profile.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'customer/profileUpdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerProfileController@update',
        'controller' => 'App\\Http\\Controllers\\CustomerProfileController@update',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/edit/password/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerProfileController@editPassword',
        'controller' => 'App\\Http\\Controllers\\CustomerProfileController@editPassword',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'password.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'customer/passwordUpdate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:customer',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerProfileController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\CustomerProfileController@updatePassword',
        'namespace' => NULL,
        'prefix' => '/customer',
        'where' => 
        array (
        ),
        'as' => 'profile.password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HC8OlxAjGwYeyiVU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'send-whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppController@send',
        'controller' => 'App\\Http\\Controllers\\WhatsAppController@send',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HC8OlxAjGwYeyiVU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::X6UvQTsd6nZEenma' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::X6UvQTsd6nZEenma',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K6DUZLvUpHgOOF4j' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::K6DUZLvUpHgOOF4j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lang.ar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/ar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LangController@ar',
        'controller' => 'App\\Http\\Controllers\\LangController@ar',
        'as' => 'lang.ar',
        'namespace' => NULL,
        'prefix' => '/lang',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lang.en' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/en',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LangController@en',
        'controller' => 'App\\Http\\Controllers\\LangController@en',
        'as' => 'lang.en',
        'namespace' => NULL,
        'prefix' => '/lang',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'category.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.deleteSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/categoryDeleteSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@deleteSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@deleteSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'category.deleteSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.showNotification' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categoryShowNotification/{id}/{notification_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@showNotification',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CategoryController@showNotification',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'category.showNotification',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activityLog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activityLog/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/activityLog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activityLog/{activityLog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activityLog/{activityLog}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/activityLog/{activityLog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activityLog.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/activityLog/{activityLog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activityLog.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityLogController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/country/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/country/{country}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'country.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'country.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CountryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CountryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/{city}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'city.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CityController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/{area}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'area.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pzRuYQaWCZ7vYSvg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/areaByCityId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AreaController@areaByCityId',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AreaController@areaByCityId',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::pzRuYQaWCZ7vYSvg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactSource',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactSource/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactSource',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactSource/{contactSource}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactSource/{contactSource}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contactSource/{contactSource}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactSource.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contactSource/{contactSource}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactSource.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactSourceController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activity/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activity/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/activity/{activity}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/activity/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/activity/{activity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'activity.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ActivityController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subActivity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subActivity/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/subActivity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subActivity/{subActivity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subActivity/{subActivity}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/subActivity/{subActivity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subActivity.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/subActivity/{subActivity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'subActivity.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5prKaEI45mk71NQu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subActivityByActivityId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@subActivityByActivityId',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SubActivityController@subActivityByActivityId',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::5prKaEI45mk71NQu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/service/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/service/{service}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/service/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'service.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Japhm4p66hhv2ZT1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/serviceByInterestId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@serviceByInterestId',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ServiceController@serviceByInterestId',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Japhm4p66hhv2ZT1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactCategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactCategory/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactCategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactCategory/{contactCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactCategory/{contactCategory}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contactCategory/{contactCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contactCategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contactCategory/{contactCategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contactCategory.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/nationality',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/nationality/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/nationality',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/nationality/{nationality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/nationality/{nationality}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/nationality/{nationality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nationality.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/nationality/{nationality}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'nationality.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NationalityController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/industry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/industry/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/industry',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/industry/{industry}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/industry/{industry}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/industry/{industry}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'industry.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/industry/{industry}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'industry.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\IndustryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/major',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/major/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/major',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/major/{major}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/major/{major}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/major/{major}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'major.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/major/{major}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'major.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yySE9MgB6B2gM7Ah' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/majorByIndustryId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MajorController@majorByIndustryId',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MajorController@majorByIndustryId',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::yySE9MgB6B2gM7Ah',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/jobTitle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/jobTitle/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/jobTitle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/jobTitle/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/jobTitle/{jobTitle}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/jobTitle/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'jobTitle.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/jobTitle/{jobTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'jobTitle.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\JobTitleController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/savedReply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/savedReply/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/savedReply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/savedReply/{savedReply}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/savedReply/{savedReply}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/savedReply/{savedReply}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'savedReply.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/savedReply/{savedReply}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'savedReply.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SavedReplyController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tag',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tag/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tag',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tag/{tag}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tag/{tag}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/tag/{tag}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tag.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/tag/{tag}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tag.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TagController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TagController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeTarget',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeTarget/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employeeTarget',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeTarget/{employeeTarget}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeTarget/{employeeTarget}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/employeeTarget/{employeeTarget}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employeeTarget.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/employeeTarget/{employeeTarget}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'employeeTarget.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\EmployeeTargetController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/{blog}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'blog.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BlogController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BlogController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/support/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/support/{support}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/support/{support}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/support/{support}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'support.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/support/{support}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'support.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\SupportController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\SupportController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact/{contact}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/contact/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'contact.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.changeActive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/changeActive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeActive',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeActive',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.changeActive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.changeTrash' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/changeTrash',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeTrash',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeTrash',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.changeTrash',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.relateEmployee' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/relateEmployee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@relateEmployee',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@relateEmployee',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.relateEmployee',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.trashed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contactTrashed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@trashed',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@trashed',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.trashed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.changeStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/changeStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@changeStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.changeStatus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.deleteSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactDeleteSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@deleteSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@deleteSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.deleteSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.trashSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactTrashSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@trashSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@trashSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.trashSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.activateSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactActivateSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@activateSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@activateSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.activateSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.relateSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contactRelateSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@relateSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@relateSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.relateSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.exportView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact/export/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@exportView',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@exportView',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.exportView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.exportData' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/export/data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@exportData',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@exportData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.exportData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.importData' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/contact/importData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ContactController@importData',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ContactController@importData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact.importData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/meeting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/meeting/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/meeting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/meeting/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/meeting/{meeting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/meeting/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'meeting.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/meeting/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'meeting.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MeetingController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/message/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/message/{message}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/message/{message}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/message/{message}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/message/{message}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'message.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.storeCustomerMessage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customerMessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeCustomerMessage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeCustomerMessage',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'message.storeCustomerMessage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.storeSingleCustomerMessage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/storeSingleCustomerMessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeSingleCustomerMessage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeSingleCustomerMessage',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'message.storeSingleCustomerMessage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'message.storeSingleContactMessage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/storeSingleContactMessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeSingleContactMessage',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\MessageController@storeSingleContactMessage',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'message.storeSingleContactMessage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/{customer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/customer/{customer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'customer.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.addInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/addInvoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addInvoice',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addInvoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.addInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.edit.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/invoice/{invoice_id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@editInvoice',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@editInvoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.edit.invoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.update.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/invoice/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@updateInvoice',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@updateInvoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.update.invoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.cancelInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/invoice/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@cancelInvoice',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@cancelInvoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.cancelInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.addParent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/addParent/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addParent',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addParent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.addParent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.storeParent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/storeParent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@storeParent',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@storeParent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.storeParent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.addReminder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/addReminder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addReminder',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addReminder',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.addReminder',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.editReminder' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/editReminder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@editReminder',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@editReminder',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.editReminder',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.addAttachment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/addAttachment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addAttachment',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@addAttachment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.addAttachment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.deleteAttachment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/deleteAttachment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@deleteAttachment',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@deleteAttachment',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.deleteAttachment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.marketingPostRetargetResults' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/marketingRetargetResults',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@postRetargetResults',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@postRetargetResults',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.marketingPostRetargetResults',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@import',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@import',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.importData' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/importData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@importData',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@importData',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.importData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.makePassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/makePassword',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@makePassword',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@makePassword',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.makePassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'customer.deleteSelected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customerDeleteSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@deleteSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CustomerController@deleteSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'customer.deleteSelected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AccountingController@invoice',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AccountingController@invoice',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'invoice.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receipt.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/receipt/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AccountingController@receipt',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AccountingController@receipt',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'receipt.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attachments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attachments/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/attachments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attachments/{attachment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attachments/{attachment}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/attachments/{attachment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attachments.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/attachments/{attachment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'attachments.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TrbXWcqnvxCQd3sj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attachment_dt_ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@dtajax',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@dtajax',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TrbXWcqnvxCQd3sj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attachments.store.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/store-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@storeAjax',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@storeAjax',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.attachments.store.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attachments.delete.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/delete-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@deleteAjax',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AttachmentsController@deleteAjax',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.attachments.delete.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'import.fetch.excel.columns' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/import/fetch.excel/columns',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ImportController@fetchExcelColumns',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ImportController@fetchExcelColumns',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'import.fetch.excel.columns',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/campaign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/campaign/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/campaign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/campaign/{campaign}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/campaign/{campaign}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/campaign/{campaign}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'campaign.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/campaign/{campaign}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'campaign.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reTarget.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reTarget',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@reTarget',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@reTarget',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'reTarget.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reTarget.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/getReTarget',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@getReTarget',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@getReTarget',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'reTarget.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reTarget.selected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reTargetSelected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@reTargetSelected',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\CampaignController@reTargetSelected',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'reTarget.selected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pointSetting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pointSetting/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/pointSetting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pointSetting/{pointSetting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pointSetting/{pointSetting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/pointSetting/{pointSetting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pointSetting.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/pointSetting/{pointSetting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'pointSetting.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\PointSettingController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.payments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/payments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@payments',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@payments',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.payments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.paymentsReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/paymentsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@paymentsReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@paymentsReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.paymentsReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.meetings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/meetings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@meetings',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@meetings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.meetings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.meetingsReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/meetingsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@meetingsReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@meetingsReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.meetingsReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.contactMeetings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/contactMeetings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactMeetings',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactMeetings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.contactMeetings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.contactMeetingsReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/contactMeetingsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactMeetingsReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactMeetingsReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.contactMeetingsReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.contacts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/contacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contacts',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contacts',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.contacts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.contactsReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/contactsReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactsReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@contactsReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.contactsReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.employeeSales' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/employeeSales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@employeeSales',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@employeeSales',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.employeeSales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.employeeSalesReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/employeeSalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@employeeSalesReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@employeeSalesReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.employeeSalesReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.branchSales' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/branchSales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@branchSales',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@branchSales',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.branchSales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.branchSalesReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/branchSalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@branchSalesReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@branchSalesReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.branchSalesReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.activitySales' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/activitySales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@activitySales',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@activitySales',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.activitySales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'report.activitySalesReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/report/activitySalesReport',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@activitySalesReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@activitySalesReport',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'report.activitySalesReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/notification/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/notification/{notification}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/notification/{notification}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/notification/{notification}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notification.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/notification/{notification}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'notification.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'todayReminders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/todayReminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayReminders',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayReminders',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'todayReminders.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'monthReminders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monthReminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@monthReminders',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@monthReminders',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'monthReminders.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delayReminders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delayReminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@delayReminders',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@delayReminders',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delayReminders.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reminder.changeStatus' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/remindersChangeStatus/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@remindersChangeStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@remindersChangeStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'reminder.changeStatus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'todayFollowUps.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/todayFollowUps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayFollowUps',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayFollowUps',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'todayFollowUps.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'monthFollowUps.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monthFollowUps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@monthFollowUps',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@monthFollowUps',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'monthFollowUps.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'todayBirthdays.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/todayBirthdays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayBirthdays',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\NotificationController@todayBirthdays',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'todayBirthdays.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tickets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tickets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tickets/{ticket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tickets/{ticket}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/tickets/{ticket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tickets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/tickets/{ticket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'tickets.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ticket.status.change' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tickets/{ticket}/change-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@changeStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ticket.status.change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ticket.assign.agent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tickets/{ticket}/assign-agent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@assignAgent',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@assignAgent',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ticket.assign.agent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ticket.reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tickets/{ticket}/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\TicketController@replyToTicket',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\TicketController@replyToTicket',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ticket.reply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/whatsapp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppController@index',
        'controller' => 'App\\Http\\Controllers\\WhatsAppController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'whatsapp.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/whatsapp-business',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/whatsapp-business/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/whatsapp-business',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/whatsapp-business/{whatsapp_business}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/whatsapp-business/{whatsapp_business}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/whatsapp-business/{whatsapp_business}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'whatsapp-business.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/whatsapp-business/{whatsapp_business}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'whatsapp-business.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\WhatsappBusinessController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/branch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/branch/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/branch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/branch/{branch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/branch/{branch}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/branch/{branch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'branch.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/branch/{branch}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'branch.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\BranchController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\BranchController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/department/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/department/{department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/department/{department}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/department/{department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'department.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/department/{department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'department.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DepartmentController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.index',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.create',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.store',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.show',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.edit',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.update',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'as' => 'role.destroy',
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roleDelete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\RoleController@delete',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\RoleController@delete',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'role.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/user/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.changeStatus' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/userChangeStatus/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@changeStatus',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@changeStatus',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.changeStatus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::03TqTpxIiiQVsh5k' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeByBranchId/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@employeeByBranchId',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@employeeByBranchId',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::03TqTpxIiiQVsh5k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::feGYe97NpdBwDF9E' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeeByDept/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@employeeByDept',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@employeeByDept',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::feGYe97NpdBwDF9E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employees.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employeesSelect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\UserController@ajaxEmployeesSelect',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\UserController@ajaxEmployeesSelect',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'employees.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show_file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show_file/{folder_name}/{photo_name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneralController@show_file',
        'controller' => 'App\\Http\\Controllers\\GeneralController@show_file',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show_file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'download_file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/download_file/{folder_name}/{photo_name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneralController@download_file',
        'controller' => 'App\\Http\\Controllers\\GeneralController@download_file',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'download_file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'allNotifications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allNotifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneralController@allNotifications',
        'controller' => 'App\\Http\\Controllers\\GeneralController@allNotifications',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'allNotifications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'markAllAsRead' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/markAllAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneralController@markAllAsRead',
        'controller' => 'App\\Http\\Controllers\\GeneralController@markAllAsRead',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'markAllAsRead',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updatePaginationCount' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/updatePaginationCount',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'lang',
          3 => 'ActivePackage',
        ),
        'uses' => 'App\\Http\\Controllers\\GeneralController@updatePaginationCount',
        'controller' => 'App\\Http\\Controllers\\GeneralController@updatePaginationCount',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'updatePaginationCount',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sendTemplateMessage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'sendTemplateMessage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppController@sendTemplateMessage',
        'controller' => 'App\\Http\\Controllers\\WhatsAppController@sendTemplateMessage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sendTemplateMessage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qr.customer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'qrcode/customer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\QrcodeController@show',
        'controller' => 'App\\Http\\Controllers\\QrcodeController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qr.customer.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qr.customer.show.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/qrcode/customer/details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\QrcodeController@showDetails',
        'controller' => 'App\\Http\\Controllers\\QrcodeController@showDetails',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qr.customer.show.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.qr.customer.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/qrcode/cusctomer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\QrcodeController@showApi',
        'controller' => 'App\\Http\\Controllers\\QrcodeController@showApi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'api.qr.customer.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ItlhxZ5opMMpXGnS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sendWhatsappTwilio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\WhatsAppTwilioController@sendWhatsAppMessage',
        'controller' => 'App\\Http\\Controllers\\WhatsAppTwilioController@sendWhatsAppMessage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ItlhxZ5opMMpXGnS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
