<template>
  <form @submit.prevent="submit">
    <input type="number" v-model.number="latA" placeholder="Lat A (-90…90)" :class="{ invalid: latA !== null && (latA < -90 || latA > 90) }" />
    <input type="number" v-model.number="lngA" placeholder="Lng A (-180…180)" :class="{ invalid: lngA !== null && (lngA < -180 || lngA > 180) }" />
    <input type="number" v-model.number="latB" placeholder="Lat B (-90…90)" :class="{ invalid: latB !== null && (latB < -90 || latB > 90) }" />
    <input type="number" v-model.number="lngB" placeholder="Lng B (-180…180)" :class="{ invalid: lngB !== null && (lngB < -180 || lngB > 180) }" />

    <button type="submit" :disabled="!isValid">Oblicz</button>

    <ResultDisplay v-if="result" :kilometers="result.kilometers" :meters="result.meters" />

    <p v-if="error" class="error">{{ error }}</p>
  </form>
</template>

<script setup lang="ts">
import { ref, computed, watch } from "vue";
import ResultDisplay from "./ResultDisplay.vue";

const latA = ref<number | null>(null);
const lngA = ref<number | null>(null);
const latB = ref<number | null>(null);
const lngB = ref<number | null>(null);

const result = ref<null | { meters: number; kilometers: number }>(null);
const error = ref<string | null>(null);

// Walidacja zakresu
const isValid = computed(() => {
  if (latA.value === null || lngA.value === null || latB.value === null || lngB.value === null) return false;

  return latA.value >= -90 && latA.value <= 90 && latB.value >= -90 && latB.value <= 90 && lngA.value >= -180 && lngA.value <= 180 && lngB.value >= -180 && lngB.value <= 180;
});

// Błędy dynamicznie
watch([latA, lngA, latB, lngB], () => {
  if (latA.value !== null && (latA.value < -90 || latA.value > 90)) {
    error.value = "Lat A musi być w zakresie -90…90";
  } else if (latB.value !== null && (latB.value < -90 || latB.value > 90)) {
    error.value = "Lat B musi być w zakresie -90…90";
  } else if (lngA.value !== null && (lngA.value < -180 || lngA.value > 180)) {
    error.value = "Lng A musi być w zakresie -180…180";
  } else if (lngB.value !== null && (lngB.value < -180 || lngB.value > 180)) {
    error.value = "Lng B musi być w zakresie -180…180";
  } else {
    error.value = null;
  }
});

const submit = async () => {
  result.value = null;
  if (!isValid.value) {
    error.value = "Wprowadź poprawne współrzędne!";
    return;
  }

  try {
    const response = await fetch("http://localhost:8000", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        latA: latA.value,
        lngA: lngA.value,
        latB: latB.value,
        lngB: lngB.value,
      }),
    });

    if (!response.ok) throw new Error("API error");
    result.value = await response.json();
  } catch {
    error.value = "Nie udało się połączyć z API";
  }
};
</script>

<style src="../style.css" />
