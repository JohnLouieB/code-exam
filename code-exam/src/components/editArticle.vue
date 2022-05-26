<template>
    <div>
        <div style="padding-bottom: 20px" v-if="article">
            <input v-model="article.title"><br><br>
            <input v-model="article.content"><br><br>
            <button @click="SubmitArticle">Save</button>
        </div>
    </div>
</template>
<script>
import Axios from 'axios';
export default{
    data() {
        return {
                article: null
        };
    },
    mounted() {
        this.retrieveArticle();
    },
    methods: {
        async retrieveArticle() {
            const response = await Axios.get(`http://localhost:8000/api/article-details/${this.$route.params.id}`)
            this.article = response.data[0];
        },

        async SubmitArticle () {
            const response = await Axios.post('http://localhost:8000/api/edit-article', this.article)
        }
    },
}
</script>