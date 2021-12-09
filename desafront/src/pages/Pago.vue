<template>
<q-page>
  <q-table :rows-per-page-options="[50,100,200,0]" title="Estudiantes" :rows="estudiantes" :columns="columns" :filter="filter">
    <template v-slot:top-right>
      <q-input outlined dense debounce="300" v-model="filter" placeholder="buscar padre">
        <template v-slot:append>
          <q-icon name="search" />
        </template>
      </q-input>
    </template>
    <template v-slot:body-cell-estado="props">
      <q-td :props="props">
        <q-badge :color="props.row.estado=='NO CANCELADO'?'negative':'positive'">{{props.row.estado}}</q-badge>
      </q-td>
    </template>
    <template v-slot:body-cell-opcion="props">
      <q-td :props="props">
        <q-btn
          v-if="props.row.estado=='NO CANCELADO'"
          dense
          color="green"
          label="cancelar"
          @click="cancelar(props.row)"
          icon="paid"
        />
      </q-td>
    </template>

  </q-table>
</q-page>
</template>

<script>
export default {
  data(){
    return{
      estudiantes:[],
      filter:'',
      columns:[
        { name: 'estudiante', label: 'estudiante', field: 'estudiante' },
        { name: 'citutor', label: 'citutor', field: 'citutor' },
        { name: 'tutor', label: 'tutor', field: 'tutor' },
        { name: 'rude', label: 'rude', field: 'rude' },
        { name: 'estado', label: 'estado', field: 'estado' },
        { name: 'opcion', label: 'opcion', field: 'opcion' },
      ]
    }
  },
  created() {
    this.misdatos()
  },
  methods:{
    cancelar(estudiante){
      this.$q.dialog({
        title: 'Seguro?',
        message: 'De proceder al pago!!',
        cancel: true,
        persistent: true
      }).onOk(() => {
        this.$q.loading.show()
        this.$axios.put(process.env.API+'/estudiante/'+estudiante.id).then(res=>{
          // this.estudiantes=res.data
          let estudiante=res.data
          this.misdatos()
          let myWindow = window.open("", "myWindow", "width=300,height=200");
          myWindow.document.write(
            '<div style="width: 100%;text-align: center"><b>G.A.M.O.</b></div>' +
            '<table style="width: 100%">' +
            '<tr><td><b>NOMBRE TUTOR</b></td><td>'+estudiante.tutor+'</td></tr>'+
            '<tr><td><b>CI TUTOR</b></td><td>'+estudiante.citutor+'</td></tr>'+
            '<tr><td><b>NOMBRE HIJO</b></td><td>'+estudiante.estudiante+'</td></tr>'+
            '<tr><td><b>FECHA</b></td><td>'+estudiante.fecha+'</td></tr>'+
            '<tr><td><b>USUARIO</b></td><td>'+estudiante.usuario+'</td></tr>'+
            '<tr><td><b>MONTO</b></td><td>300</td></tr>'+
            '</table>' +
            '<div style="text-align: center">---------------------<br><b>FIRMA</b></div>'
          );
          myWindow.document.close();
          myWindow.focus();
          myWindow.print();
          myWindow.close();
        })
      })
    },
    misdatos(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/estudiante').then(res=>{
        this.estudiantes=res.data
        this.$q.loading.hide()
      })
    }
  }
}
</script>

<style scoped>

</style>
