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
    public partial class Form4 : Form
    {
        private string ciUsuario; // Variable para almacenar el CI del usuario

        public Form4(string ci)
        {
            InitializeComponent();
            ciUsuario = ci; // Guardar el CI en la variable
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
                    MessageBox.Show("Consulta realizada con éxito!", "Éxito", MessageBoxButtons.OK, MessageBoxIcon.Information);
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


        private void cargarPropiedadPorPersona(string ci)
        {
            // Consulta SQL para obtener propiedades de una persona específica
            string query = "SELECT b.id, a.ci, a.aPaterno, b.codCatastral, b.direccion, b.distrito, b.zona, b.superficie, " +
                           "b.xIni, b.yIni, b.xFin, b.yFin, b.tipoPropiedad, b.valor " +
                           "FROM Persona a " +
                           "INNER JOIN Propiedad b ON a.id_persona = b.id_persona " +
                           "WHERE a.ci = '" + ci + "';"; // Utiliza el CI como filtro

            // Llama a la función ExecuteQuery para obtener los datos
            DataTable result = ExecuteQuery(query);

            // Asigna el resultado al DataGridView
            dataGridView1.DataSource = result;

        }


        private void Form4_Load(object sender, EventArgs e)
        {
            cargarPropiedadPorPersona(ciUsuario);
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
