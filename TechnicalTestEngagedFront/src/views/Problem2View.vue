<template>
  <header>
    <HeaderComponent />
  </header>
  <main>
    <div class="container">
      <div class="row mt-2 pt-2">
        <div class="col-12 col-md-6 ">
          <h3 class="titulo-especial">Problem 2: String Maximum Value</h3>
          <p>
            Alejandro loves strings more than anything. He has a string t and wants to calculate the value of each of its substrings s using the function </p> 
            <ul>f(s) defined as: f(s) = |s| × (number of times s occurs in t) </ul>
            <p>Your task is to help Alejandro find the maximum value of f(s) among all substrings of string t.
          </p>
          <textarea class="form-control textarea" id="input2" v-model="input2" placeholder="Enter a string here..."></textarea>
        </div>
        
        <div class="row mt-2 pt-2">
          <div class="col-12 col-md-6 ">
          <button class="btn custom-button" type="button" @click="solveProblem">Solve</button>
          </div>
        </div>
         <div class="row mt-2 pt-2">
          <div class="col-12 col-md-6 ">
            <h4 class="titulo-especial" v-if="output2">Result</h4>
            <pre id="output2" v-if="output2">{{ output2 }}</pre>
          </div>
         
         </div>
          
      </div>
    </div>
    
  </main>
</template>
<script setup>
import HeaderComponent from '../components/Header.vue'
import { ref } from 'vue';
import { calculate2 } from "@/services/StringValueServices.js";

const input2 = ref('');
const output2 = ref('');
const isLoading = ref(false);

const solveProblem = async () => {
  if (!input2.value.trim()) {
    output2.value = 'Error: Insert a string';
    return;
  }

  try {
    isLoading.value = true;
    const response = await calculate2(input2.value);
    output2.value = response.data.max_value || response.data.result;
  } catch (error) {
    output2.value = 'Error: ' + (error.response?.data?.message || error.message);
  } finally {
    isLoading.value = false;
  }
}
</script>