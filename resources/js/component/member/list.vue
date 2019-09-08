<template>
    <div>
        <ul>
            <li v-for="(member,index) in members">
                <span>{{member.id}}</span>
                <span>{{member.person_name}}</span>
                <span>{{member.tel}}</span>
                <span>{{member.email}}</span>
                <span>{{member.created_at}}</span>
                <span>
                    <a :href=" '/edit/' + member.id">編集</a>
                </span>
            </li>
        </ul>
    </div>
</template>
<script>
import Sugar from 'Sugar';
export default {
  name: 'App',
  methods:{
    registMember() {
    }
  },
  created(){
      let link = '/api/persons/'
      axios.get(link).then(response => {
          this.members = response.data;

          console.log(this.members)
      }, function(error){
          console.log(error.statusText);
      });
  },
  data(){
    return {
        members:this.members
    }
  }
}
</script>
