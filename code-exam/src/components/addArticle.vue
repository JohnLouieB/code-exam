<template>
    <div class="Create-Article">
        <h4>Add Article Form</h4>
        <input v-model="title" type="text" id="article-title" placeholder="Article Title"/>
        <br><br>
        <input v-model="content" type="text" id="article-content" placeholder="Article Content"/>
        <br><br>
        <button @click="SubmitArticle" id="submit-article">Post</button>
    </div>
</template>
<script>
import Axios from 'axios';
// import Articles from './Articles.vue';
export default{
    data() {
        return {
                title: null,
                content: null,
        };
    },
    methods: {
        async SubmitArticle () {
            const response = await Axios.post('http://localhost:8000/api/insert-article', {
                title: this.title,
                content: this.content
            })
            this.$router.push('/')
        }
    },
}

</script>