<template>
 <div>
    <a href="" v-if="status == false&&show" @click.prevent="like"><i class="fa fa-dumbbell unlike-btn" ></i></a>
    <a href="" v-if="status==true&&show" type="button" @click.prevent="like"><i class="fa fa-dumbbell like-btn" ></i></a>
 </div>
</template>

<script>
    export default {
        // laravelのbladeでcommentのidを付与
 props: ['comment_id'],
 data() {
   return {
     status: false,
     show: false,
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
       if(res.data == 1) {
        //like.checkで1を返すかどうか調べる
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
       console.log('test');
   }

 }
    }
</script>
