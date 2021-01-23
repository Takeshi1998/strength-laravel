<template>
 <div　id>
    <a href="" v-if="status==false&&show" @click.prevent="like"><i class="fa fa-dumbbell like-btn" >{{likeCount}}</i></a>
    <a href="" v-if="status==true&&show"  @click.prevent="unlike"><i class="fa fa-dumbbell unlike-btn" >{{likeCount}}</i></a>
 </div>
</template>

<script>
    export default {
        // laravelのbladeでcommentのidを付与
 props: ['comment_id','like_count'],
 data() {
   return {
     status: false,
     show: false,
     likeCount: this.like_count,
   }
 },
 created() {
   this.like_check()
 },
 methods:{
    like_check() {
     const id = this.comment_id
     const array = ["api/comment/",id,"/likedcheck"];
     const path = array.join('')
     axios.get(path).then(res => {
       if(res.data==1) {
        //like.checkでtrueを返すかどうか調べる
         this.status = true
         this.show= true
       } else {
         this.status = false
         this.show=true
       }
     }).catch(function(err) {
         console.log(err)
     })
   },
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
