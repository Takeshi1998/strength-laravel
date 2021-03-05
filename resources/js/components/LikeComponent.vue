<template>
 <div>
    <a href="" v-if="status==false&&show" @click.prevent="like"><i class="fa fa-dumbbell like-btn" >{{likeCount}}</i></a>
    <a href="" v-if="status==true&&show"  @click.prevent="unlike"><i class="fa fa-dumbbell unlike-btn" >{{likeCount}}</i></a>
 </div>
</template>

<script>
    export default {
        // laravelのbladeでcommentのidを付与
 props: ['comment_id','like_count','like_flag'],
 data() {
   return {
     status: this.like_flag,
     show: true,
     likeCount: this.like_count,
   }
 },
 methods:{
   like(){
        this.show=false
        const id = this.comment_id
        const array = ["comment/",id,"/like"];
        const path = array.join('')
        axios.get(path).then(res=>{
            this.likeCount+=1
            this.status=true
        }).catch(function(err){
            console.log(err)
        }).finally(() => this.show = true)
    },
    unlike(){
        this.show=false
        const id = this.comment_id
        const array = ["comment/",id,"/unlike"];
        const path = array.join('')
        axios.get(path).then(res=>{
            this.likeCount-=1
            this.status=false
        }).catch(function(err){
            console.log(err)
        }).finally(() => this.show = true)
    }

 }
    }
</script>
