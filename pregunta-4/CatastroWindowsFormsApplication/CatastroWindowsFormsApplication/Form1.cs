using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data;
using System.Data.SqlClient;

namespace CatastroWindowsFormsApplication
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }


        public DataTable ExecuteQuery(string query)
        {
            string connectionString = "Server=(local);Database=BDChristian;Integrated Security=True;";
            DataTable dataTable = new DataTable();

            try
            {
                using (SqlConnection connection = new SqlConnection(connectionString))
                {
                    SqlCommand command = new SqlCommand(query, connection);
                    SqlDataAdapter adapter = new SqlDataAdapter(command);

                    connection.Open(); // Se abre la conexión
                    adapter.Fill(dataTable); // Se llena el DataTable con los resultados de la consulta

                    // Puedes mostrar un mensaje de éxito si lo deseas
                   // MessageBox.Show("Consulta realizada con éxito!", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information);
                }
            }
            catch (Exception ex)
            {
                // Muestra un mensaje de error si hay un problema
                MessageBox.Show("Error al realizar la consulta: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

            return dataTable; // Devuelve el DataTable (puede estar vacío si hubo un error)
        }

   
        public int ExecuteNonQuery(string query)
        {
            string connectionString = "Server=(local);Database=BDChristian;Integrated Security=True;"; // Conexión a la BD
            int filasAfectadas = 0;

            try
            {
                using (SqlConnection connection = new SqlConnection(connectionString))
                {
                    SqlCommand command = new SqlCommand(query, connection);
                    connection.Open();  // Abre la conexión a la base de datos
                    filasAfectadas = command.ExecuteNonQuery();  // Ejecuta la consulta y obtiene las filas afectadas

                   // MessageBox.Show("Operación realizada con éxito. Filas afectadas: " + filasAfectadas,
                                   // "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information);
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

            return filasAfectadas;  // Retorna el número de filas afectadas
        }



        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }


        private void button1_Click(object sender, EventArgs e)
        {
            string usuario = textBox1.Text;
            string password = textBox2.Text;

            // Consulta SQL para verificar el usuario y obtener el rol
            string query = "SELECT * FROM Usuario WHERE ci = '" + usuario + "' AND password = '" + password + "'";

            DataTable result = ExecuteQuery(query);

            // Verificar si se encontró un registro
            if (result.Rows.Count > 0)
            {
                // Las credenciales son correctas, obtener el rol
                string rol = result.Rows[0]["rol"].ToString();
                string ci = result.Rows[0]["ci"].ToString(); // Obtener el CI

                // Abrir el formulario correspondiente según el rol
                if (rol == "funcionario")
                {
                    Form2 form2 = new Form2(this); // Crear instancia de Form2
                    form2.Show(); // Mostrar Form2
                }
                else if (rol == "persona")
                {
                    Form4 form4 = new Form4(ci); // Pasar el CI al constructor de Form4
                    form4.Show();
                }
                else
                {
                    MessageBox.Show("Rol de usuario no reconocido.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }

                this.Hide();  // Ocultar Form1
            }
            else
            {
                // Las credenciales son incorrectas
                MessageBox.Show("Credenciales incorrectas. Inténtalo de nuevo.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

    
    }
}
