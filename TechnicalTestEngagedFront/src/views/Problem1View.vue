<template>
  <header>
    <HeaderComponent />
  </header>
  <main>
    <div class="container">
      <div class="row mt-2 pt-2">
        <div class="col-12 col-md-6 ">
          <h3 class="titulo-especial">Problem 1: Chees Attack</h3>
          <p>You have a square chess board with one queen and a number of obstacles placed on it. Determine how many squares the queen can attack.</p>
          <ul>Parameters:
            <li>- n: an integer, the number of rows and columns in the board</li>
            <li>- k: an integer, the number of obstacles on the board </li>
            <li>- rq: an integer, the row number of the queen's position</li>
            <li>- cq: an integer, the column number of the queen's position</li>
            <li>- obstacles: a 2D list of integers where each element is an array [r, c] indicating an obstacle’s position</li>
          </ul>
          <textarea class="form-control textarea" id="input1" v-model="input1" placeholder="Enter [n k] [rq cq] [r1 c1] [r2 c2] here..."></textarea>
        </div>
        
        <div class="row mt-2 pt-2">
          <div class="col-12 col-md-6 ">
          <button class="btn custom-button" type="button" @click="solveProblem">Solve</button>
          </div>
        </div>
         <div class="row mt-2 pt-2">
          <div class="col-12 col-md-6 ">
            <h4 class="titulo-especial" v-if="output1">Result</h4>
            <pre id="output1" v-if="output1">{{ output1 }}</pre>
          </div>
         
         </div>
          
      </div>
    </div>
  </main>
</template>

<script setup>
import HeaderComponent from '../components/Header.vue'
import { ref } from 'vue';
import { calculate } from "@/services/ChessAttackServices.js";

const input1 = ref('');
const output1 = ref('');

const solveProblem = async () => {
  try {
    const lines = input1.value.trim().split('\n');
    const [n, k] = lines[0].split(' ').map(Number);
    const [rq, cq] = lines[1].split(' ').map(Number);
    const obstacles = lines.slice(2).map(line => line.split(' ').map(Number));

    const response = await calculate({
      n,
      k,
      rq,
      cq,
      obstacles
    });
    
    output1.value = response.data.result;
  } catch (error) {
    output1.value = 'Error: ' + (error.response?.data?.message || error.message);
  }
}
</script>