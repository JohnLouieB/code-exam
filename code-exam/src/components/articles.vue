<template>
    <div id="articles">
        <div style="border: 1px solid red;" v-for="article in articles" :key="article.id" @click="showArticle(article.id)">
            <h3>{{ article.title }}</h3>
            <p>{{ article.content }}</p>
            <p>{{ article.created_at }}</p>
        </div>
    </div>
</template>
<script>
import Axios from 'axios';
// import Articles from './Articles.vue';
export default {
    data() {
        return {
            articles: []
        };
    },
    mounted() {
        this.retrieveArticles();
    },
    methods: {
        async retrieveArticles() {
            const data = await Axios.get('http://localhost:8000/api/articles')
            this.articles = data.data;
        },

        showArticle(id) {
            this.$router.push(`/article-details/${id}`)
        }
    },
}
</script>