<template>



</template>


<script type="text/javascript">
import axios from "axios";
import AppStorage from "../../Helpers/AppStorage";
export default {
    created() {
       AppStorage.clear();
       this.$swal({
                        icon: "success",
                        position: "top-end",
                        title: "Logged Out",
                    });
        this.$router.push({ name: 'login' });
    },
   
};
</script>

<style type="text/css"></style>