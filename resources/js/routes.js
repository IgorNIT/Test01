import Blog from './pages/News.vue';

const routes =  [
    {
        path: '/',
        name: 'News',
        component: News
    },
   /* {
        path: '/:admin/companies/index/edit/:id',
        name: 'CompanyEdit',
        component: CompanyEdit
    },
    {
        path: '/:admin/companies/index/employees/:id',
        name: 'CompanyEmployees',
        component: CompanyEmployees
    },
    {
        path: '/:admin/companies/registration-requests/:id',
        name: 'CompanyRegistration',
        component: CompanyRegistration
    },
    {
        path: '/:admin/companies/employee-registration-requests/:id',
        name: 'CompanyEmployeeRegistration',
        component: CompanyEmployeeRegistration
    },*/
];

export default routes;
