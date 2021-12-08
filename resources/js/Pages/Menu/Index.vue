<template>
    <teleport to="head">
        <title>Menu</title>
    </teleport>

    <el-main class="content">
      <el-row :gutter="10">
        <el-col :span="10">
          <el-card id="menu-card" class="box-card">
            <template #header>
              <h5 v-if="isMenuEdit">Ubah Menu</h5>
              <h5 v-else>Tambah Menu Baru</h5>
            </template>
            <el-form ref="menuForm" label-position="left" label-width="100px" :model="menuForm" :rules="formRules">
              <el-form-item label="Nama" prop="name">
                <el-input v-model="menuForm.name"></el-input>
              </el-form-item>
              <el-form-item label="URL" prop="url">
                <el-input placeholder="https://gkiibpn.com" v-model="menuForm.url"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="handleSubmitForm('menuForm')">
                  <span v-if="isMenuEdit">Ubah</span>
                  <span v-else>Buat</span>
                </el-button>
                <el-button v-if="isMenuEdit" @click="resetForm('menuForm')">Reset</el-button>
              </el-form-item>
            </el-form>
          </el-card>
          <el-card id="submenu-card" class="box-card">
            <template #header>
              <h5 v-if="isSubmenuEdit">Ubah Submenu</h5>
              <h5 v-else>Tambah Submenu Baru</h5>
            </template>
            <el-form ref="submenuForm" label-position="left" label-width="100px" :model="submenuForm" :rules="formRules">
              <el-form-item label="Menu">
                <el-input disabled readonly v-model="submenuForm.menu_name"></el-input>
              </el-form-item>
              <el-form-item label="Nama" prop="name">
                <el-input :disabled="!selectedMenu && !selectedSubmenu" v-model="submenuForm.name"></el-input>
              </el-form-item>
              <el-form-item label="URL" prop="url">
                <el-input :disabled="!selectedMenu && !selectedSubmenu" placeholder="http://kenji.com" v-model="submenuForm.url"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="handleSubmitForm('submenuForm')">
                  <span v-if="isSubmenuEdit">Ubah</span>
                  <span v-else>Buat</span>
                </el-button>
                <el-button :disabled="!selectedMenu && !selectedSubmenu" v-if="isSubmenuEdit" @click="resetForm('submenuForm')">Reset</el-button>
              </el-form-item>
            </el-form>
          </el-card>
        </el-col>
        <el-col :span="14">
          <el-card>
            <template #header>
              <span>Daftar Menu</span>
            </template>
            <el-tree default-expand-all :data="menus" :props="defaultProps" @node-click="handleTreeClick">
              <template #default="{ node, data }">
                <span class="custom-tree-node">
                  <span>{{ node.label }}</span>
                  <div>
                    <el-button
                      v-if="!data.menu_name"
                      type="primary"
                      size="mini"
                      icon="el-icon-plus"
                      @click="handleSelectMenu(data)"
                      circle
                    />
                    <el-popconfirm
                      title="Are you sure you want to delete this menu?"
                      @confirm="handleDelete(data)"
                    >
                      <template #reference>
                          <el-button
                              type="danger"
                              @click.prevent=""
                              size="mini"
                              icon="el-icon-delete"
                              circle
                          />
                      </template>
                    </el-popconfirm>
                  </div>
                </span>
              </template>
            </el-tree>
          </el-card>
        </el-col>
      </el-row>
    </el-main>
</template>

<script>
import { inject } from "vue";
export default {
    name: "MenuIndex",
    props: {
      menus: {
        type: Array,
        default: () => ([]),
      }
    },
    data() {
      return {
        isMenuEdit: false,
        isSubmenuEdit: false,
        selectedMenu: null,
        selectedSubmenu: null,
        menuForm: {
          name: null,
          url: null
        },
        submenuForm: {
          name: null,
          url: null,
          menu_name: null,
          menu_id: null,
        },
        formRules: {
          name: [
            { required: true, message: 'Nama wajib diisi', trigger: 'blur' },
            { min: 3, message: 'Minimal 3kata', trigger: 'blur' }
          ],
          url: [
            { required: true, message: 'URL wajib diisi', trigger: 'blur' },
            { min: 3, message: 'Minimal 3kata', trigger: 'blur' }
          ],
        },
        defaultProps: {
          children: 'items',
          label: 'name'
        }
      }
    },
    setup(props, { emit }) {
        inject("breadcrumbs").value = [{ title: "Menu" }];
    },
    methods: {
      resetForm(formName) {
        this.$refs[formName].resetFields();
        if(type === 'menuForm') {
          this.isMenuEdit = false;
          this.selectedMenu = null;
        } else {
          this.isSubmenuEdit = false;
          this.selectedSubmenu = null;
        }
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            alert('submit!');
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      handleSubmitForm(type) {
        this.$refs[type].validate((valid) => {
          if (valid) {
            const isMenu = type === 'menuForm';
            const isEdit = isMenu ? this.isMenuEdit : this.isSubmenuEdit;
            const data = {
              ...this[type],
              type: isMenu ? 'menu' : 'submenu'
            };
            if(!isEdit) {
              this.$inertia.post('/admin/menus', data);
            } else {
              const id = isMenu ? this.selectedMenu.id : this.selectedSubmenu.id;
              this.$inertia.put(`/admin/menus/${id}`, data);
            }
            this.resetForm(type);
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      handleTreeClick(data) {
        const isMenu = data.menu_id === undefined;
        const { name, url } = data;
        if(isMenu) {
          this.isMenuEdit = true;
          this.selectedMenu = data;
          this.menuForm = { name, url };
          this.submenuForm = {...this.submenuForm, menu_name: name, menu_id: data.id};
        } else {
          const { menu_name, menu_id } = data;
          this.isSubmenuEdit = true;
          this.selectedSubmenu = data;
          this.submenuForm = { name, url, menu_name, menu_id };
        }
      },
      handleSelectMenu(data) {
        this.selectedMenu = data;
        this.submenuForm = {...this.submenuForm, menu_name: data.name, menu_id: data.id};
      },
      handleDelete(data) {
        const type = data.menu_id === undefined ? 'menu' : 'submenu';
        this.$inertia.delete(`/admin/menus/${type}/${data.id}`);
      }
    },
};
</script>

<style lang="scss">
  #submenu-card {
    margin-top: 3rem;
  }
  .el-tree-node {
    margin-bottom: 6px!important;
  }
  .el-tree-node>.el-tree-node__children {
    margin-top: 8px!important;
  }
  .custom-tree-node {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    padding-right: 8px;
  }
</style>
