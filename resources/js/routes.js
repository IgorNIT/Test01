import News from './pages/News.vue';
import NewsItem from  './pages/NewsItem.vue';
import Page404 from  './pages/Page404.vue';

const routes =  [
    {
        path: '/',
        name: 'News',
        component: News,
    },
    {
        path: '/:url',
        name: 'NewsItem',
        component: NewsItem
    },
    {
        path: '/404',
        name: '404',
        component: Page404
    },
];



export default routes;
