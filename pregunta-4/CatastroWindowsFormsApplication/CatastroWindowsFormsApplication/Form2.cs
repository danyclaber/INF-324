using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CatastroWindowsFormsApplication
{
    public partial class Form2 : Form
    {
        private Form1 form1; // Referencia al Form1
        public Form2(Form1 form1)
        {
            InitializeComponent();
            this.form1 = form1; // Guardar la referencia del Form1
        }


        private void Form2_Load(object sender, EventArgs e)
        {
           
        }



        public void mostrarPropiedades()
        {
            string query = "SELECT b.id, " +
                  "a.id_persona, "+
                  "a.ci, " +
                  "a.nombres, "+
                  "a.aPaterno, " +
                  "a.aMaterno, " +
                  "b.codCatastral, " +
                  "b.direccion, " +
                  "b.distrito, " +
                  "b.zona, " +
                  "b.superficie, " +
                  "b.xIni, " +
                  "b.yIni, " +
                  "b.xFin, " +
                  "b.yFin, " +
                  "b.tipoPropiedad, " +
                  "b.valor " +
                  "FROM Persona a " +
                  "INNER JOIN Propiedad b ON a.id_persona = b.id_persona;";

            // Llama a la función ExecuteQuery de Form1
            DataTable result = form1.ExecuteQuery(query);

            // Asigna el resultado al DataGridView
            dataGridView1.DataSource = result;

            dataGridView1.Columns["id"].ReadOnly = true;
            dataGridView1.Columns["id_persona"].ReadOnly = true;
            dataGridView1.Columns["ci"].ReadOnly = true;
            dataGridView1.Columns["nombres"].ReadOnly = true;
            dataGridView1.Columns["aPaterno"].ReadOnly = true;
            dataGridView1.Columns["aMaterno"].ReadOnly = true;

     

            // Agregar columna de botón "Eliminar" si no existe
            if (dataGridView1.Columns["btnEliminar"] == null)
            {
                DataGridViewButtonColumn btnEliminar = new DataGridViewButtonColumn();
                btnEliminar.HeaderText = "Eliminar";
                btnEliminar.Name = "btnEliminar";
                btnEliminar.Text = "Eliminar";
                btnEliminar.UseColumnTextForButtonValue = true;
                dataGridView1.Columns.Add(btnEliminar);
            }

        }




        private void button1_Click(object sender, EventArgs e)
        {
            mostrarPropiedades();
        }


        // Evento CellContentClick para manejar el clic en el botón "Eliminar"
        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            // Verifica si el clic ocurrió en la columna de botones "Eliminar"
            if (e.ColumnIndex == dataGridView1.Columns["btnEliminar"].Index && e.RowIndex >= 0)
            {
                // Obtener el ID del registro a eliminar (en este caso, el id de la propiedad)
                int idPropiedad = Convert.ToInt32(dataGridView1.Rows[e.RowIndex].Cells["id"].Value);

                // Mostrar un mensaje de confirmación antes de eliminar
                DialogResult result = MessageBox.Show("¿Estás seguro de que deseas eliminar esta propiedad?",
                                                      "Confirmar eliminación",
                                                      MessageBoxButtons.YesNo,
                                                      MessageBoxIcon.Warning);

                if (result == DialogResult.Yes)
                {
                    // Consulta SQL para eliminar el registro de la base de datos
                    string query = "DELETE FROM Propiedad WHERE id = " + idPropiedad;

                    // Ejecutar la consulta de eliminación
                    int filasAfectadas = form1.ExecuteNonQuery(query);

                    // Verificar si la eliminación fue exitosa
                    if (filasAfectadas > 0)
                    {
                        // Eliminar la fila del DataGridView
                        dataGridView1.Rows.RemoveAt(e.RowIndex);
                        MessageBox.Show("Propiedad eliminada con éxito.", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No se pudo eliminar la propiedad.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {

            Form3 form3 = new Form3(form1,this); // Crear instancia de Form2
            form3.Show(); // Mostrar Form2
        }

        private void dataGridView1_CellEndEdit(object sender, DataGridViewCellEventArgs e)
        {
           
            // Obtener el ID de la propiedad que se está editando
            int idPropiedad = Convert.ToInt32(dataGridView1.Rows[e.RowIndex].Cells["id"].Value);

            // Obtener el nombre de la columna editada
            string columnName = dataGridView1.Columns[e.ColumnIndex].Name;

            // Obtener el nuevo valor de la celda editada
            string newValue = dataGridView1.Rows[e.RowIndex].Cells[e.ColumnIndex].Value.ToString();

            // Construir la consulta de actualización
            string query = "UPDATE Propiedad SET " + columnName + " = '" + newValue + "' WHERE id = " + idPropiedad;

            // Ejecutar la consulta de actualización
            int filasAfectadas = form1.ExecuteNonQuery(query);

            // Verificar si la actualización fue exitosa
            if (filasAfectadas > 0)
            {
                MessageBox.Show("Propiedad actualizada con éxito.", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            else
            {
                MessageBox.Show("Error al actualizar la propiedad.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }


        }
    }
}
