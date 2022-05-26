import { createRouter, createWebHistory } from 'vue-router'

import AddArticle from '../components/addArticle'
import Articles from '../components/articles'
import ArticleDetails from '../components/articleDetails'
import EditArticle  from '../components/editArticle'

const routes = [
  {
    path: '/',
    name: 'articles',
    component: Articles
  },
  {
    path: '/add-articles',
    name: 'add-articles',
    component: AddArticle
  },
  {
    path: '/article-details/:id',
    name: 'article-details',
    component: ArticleDetails
  },
  {
    path: '/edit-article/:id',
    name: 'edit-article',
    component: EditArticle
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
