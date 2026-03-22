<script setup>
import { ref, onMounted } from "vue";
import api from "./services/api";

const companies = ref([]);
const message = ref("");
const errorMessage = ref("");
const loading = ref(false);
const editingId = ref(null);
const loadingButton = ref(false);

// Formulário
const form = ref({
  name: "",
  email: "",
  website: "",
});

const deleteCompany = async (id) => {
  try {
    await api.delete(`/companies/${id}`);
    fetchCompanies();
  } catch (error) {
    console.error("Erro ao deletar empresa:", error);
  }
};

const editCompany = (company) => {
  form.value = {
    name: company.name,
    email: company.email,
    website: company.website || "",
  };
  // limpa mensagens anteriores
  message.value = "";
  errorMessage.value = "";

  editingId.value = company.id;
};

// Buscar empresas
const fetchCompanies = async () => {
  try {
    loading.value = true;

    const response = await api.get("/companies");
    companies.value = response.data.data;
  } catch (error) {
    console.error("Erro ao buscar empresas:", error);
  } finally {
    loading.value = false;
  }
};

// Cria ou atualiza empresa 
const createCompany = async () => {
const createCompany = async () => {
  if (!form.value.name || !form.value.email) {
    errorMessage.value = "Nome e email são obrigatórios";
    return;
  }

  try {
    loadingButton.value = true;

    if (editingId.value) {
      await api.put(`/companies/${editingId.value}`, form.value);
      message.value = "Empresa atualizada com sucesso!";
    } else {
      await api.post("/companies", form.value);
      message.value = "Empresa cadastrada com sucesso!";
    }

    errorMessage.value = "";
    form.value = { name: "", email: "", website: "" };
    editingId.value = null;

    fetchCompanies();
  } catch (error) {
    message.value = "";
    errorMessage.value = "Erro ao salvar empresa";
  } finally {
    loadingButton.value = false;
  }
};

onMounted(() => {
  fetchCompanies();
});
</script>

<template>
  <div v-if="loading" class="text-center my-3">
    <div class="spinner-border"></div>
  </div>

  <div class="container mt-5">
    <h1 class="mb-4 text-center">Sistema de Empresas</h1>

    <div v-if="message" class="alert alert-success">
      {{ message }}
    </div>

    <div v-if="errorMessage" class="alert alert-danger">
      {{ errorMessage }}
    </div>

    <!-- FORM -->
    <div class="card p-4 mb-4">
      <h3>Cadastrar Empresa</h3>

      <div class="mb-2">
        <input v-model="form.name" class="form-control" placeholder="Nome" />
      </div>

      <div class="mb-2">
        <input v-model="form.email" class="form-control" placeholder="Email" />
      </div>

      <div class="mb-2">
        <input v-model="form.website" class="form-control" placeholder="Website" />
      </div>

      <button class="btn btn-primary" @click="createCompany" :disabled="loadingButton">
        <span v-if="loadingButton" class="spinner-border spinner-border-sm"></span>
        {{ loadingButton ? "Salvando..." : editingId ? "Atualizar" : "Cadastrar" }}
      </button>
    </div>

    <!-- LISTA -->
    <div class="card p-4">
      <h3>Empresas</h3>

      <ul class="list-group">
        <li
          class="list-group-item d-flex justify-content-between align-items-center"
          v-for="company in companies"
          :key="company.id"
        >
          <div>
            <strong>{{ company.name }}</strong
            ><br />
            <small>{{ company.email }}</small>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-warning btn-sm" @click="editCompany(company)">
              <i class="bi bi-pencil"></i>
            </button>

            <button class="btn btn-danger btn-sm" @click="deleteCompany(company.id)">
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
