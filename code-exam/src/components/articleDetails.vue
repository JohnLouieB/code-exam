<template>
    <div id="article-detail">
        <div style="border: 1px solid red; padding-bottom: 20px" v-if="article">
            <h3>{{ article.title }}</h3>
            <p>{{ article.content }}</p>
            <p>{{ article.created_at }}</p>
            <h4>{{ article.likes }}</h4>
            <button style="background-color: orange;" @click="editArticle">Edit</button>
            <button style="background-color: red;" @click="deleteArticle">Delete</button>
            <button :disabled="disable" @click="like">UpVote</button>
            <button :disabled="disable" @click="dislike">DownVote</button>
        </div>
    </div>
</template>
<script>
import Axios from 'axios';
// import Articles from './Articles.vue';
export default{
    data() {
        return {
                article: null,
                disable: false
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
        editArticle() {
            this.$router.push(`/edit-article/${this.article.id}`)
        },
        async deleteArticle() {
            const response = await Axios.delete(`http://localhost:8000/api/delete-article/${this.$route.params.id}`);
            this.$router.push(`/`);
        },
        async like() {
            this.disable = true;
            this.article.likes += 1;
            const response = await Axios.post('http://localhost:8000/api/edit-article', this.article)
            this.disable = false;
        },
        async dislike() {
            if(this.article.likes > 0){
                this.disable = true;
                this.article.likes -= 1;
                const response = await Axios.post('http://localhost:8000/api/edit-article', this.article)
                this.disable = false;
            }else{
                alert('Reached limit');
            }
        }
    },
}
</script>