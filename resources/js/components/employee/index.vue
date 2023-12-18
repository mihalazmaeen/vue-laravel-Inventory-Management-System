<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
            
               
                <div class="card shadow-sm my-5">
                    
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            All Employee
                                        </h1>
                                    </div>
                               
                                  
                                    <div class="text-center">
                                        <router-link
                                            class="font-weight-bold small btn btn-primary"
                                            to="/add-employee"
                                            >Add Employee</router-link
                                        >
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                                      <input type="text" v-model="searchKey" class="form-control" placeholder="Enter Search Term" id="search-key">
                                    </div>
                          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
               
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Photo</th>
                        <th>Joining Date</th>
                        <th>Salary</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="employee in filtersearch" :key="employee.id">
                        <td>{{ employee.fname }} {{ employee.lname }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.phone_number }}</td>
                        <td><img :src="employee.photo" id="em_photo"></td>
                        <td>{{ employee.joining_date }}</td>
                        <td>{{ employee.salary }}</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-primary">Edit</a>
                          <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                   
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
p
<script type="text/javascript">
import axios from "axios";
import User from "../../Helpers/User";
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "login" });
        }
        this.AllEmployee()
    },
    data() {
        return {
            employees:[],
            searchKey:''
        }
    },
   computed:{
        filtersearch(){
            const searchTermLower = this.searchKey.toLowerCase();
            return this.employees.filter(employee => {
                return (
                    (employee.fname && employee.fname.toLowerCase().includes(searchTermLower)) ||
                    (employee.phone_number && employee.phone_number.toLowerCase().includes(searchTermLower)) ||
                    (employee.lname && employee.lname.toLowerCase().includes(searchTermLower)) ||
                    (employee.email && employee.email.toLowerCase().includes(searchTermLower)) 
                );
            });
            // return this.employees.filter(employee =>{
            //     return (
            //         (employee.name && employee.name.match(this.searchTerm)) ||
            //         (employee.email && employee.email.match(this.searchTerm))
            //     );
            // })
        }
    },
   
    methods: {
      AllEmployee(){
        axios.get('/api/employee/').then(({data})=>(this.employees = data)).catch()
      }
    },
};
</script>

<style type="text/css">
#em_photo{
    height: 40px;
    width: 40px;
}
#search-key{
  width: 300px;
}
</style>
