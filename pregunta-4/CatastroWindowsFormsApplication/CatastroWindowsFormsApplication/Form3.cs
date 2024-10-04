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
    public partial class Form3 : Form
    {
        private Form1 form1;
        private Form2 form2;

        // Constructor que acepta dos formularios
        public Form3(Form1 form1, Form2 form2)
        {
            InitializeComponent();
            this.form1 = form1;  // Guarda la referencia del Form1
            this.form2 = form2;  // Guarda la referencia del Form2
        }


        private void Form3_Load(object sender, EventArgs e)
        {
           
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void textBox8_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Asignando valores de los TextBox a las variables
            string ci = textBox1.Text;
            string nombres = textBox2.Text;
            string aPaterno = textBox3.Text;
            string aMaterno = textBox4.Text;

            // Consulta SQL para insertar los datos en la tabla Persona
            string queryPersona = "INSERT INTO Persona (ci, nombres, aPaterno, aMaterno) " +
                                  "VALUES ('" + ci + "', '" + nombres + "', '" + aPaterno + "', '" + aMaterno + "'); " +
                                  "SELECT SCOPE_IDENTITY();"; // Recupera el ID de la persona recién insertada

            // Ejecutar la consulta para insertar la persona y obtener el ID de la persona
            DataTable resultPersona = form1.ExecuteQuery(queryPersona);
            int idPersona = Convert.ToInt32(resultPersona.Rows[0][0]); // Obtenemos el id_persona insertado



            // Valores fijos para xIni, yIni, xFin, yFin
            decimal xIni = 100.5m;
            decimal yIni = 200.5m;
            decimal xFin = 300.5m;
            decimal yFin = 400.5m;

            // Ahora, insertar la propiedad
            string codCatastral = textBox8.Text;  // Código catastral
            string direccion = textBox7.Text;     // Dirección
            int distrito = Convert.ToInt32(textBox6.Text); // Distrito
            string zona = textBox5.Text;          // Zona
            decimal superficie = Convert.ToDecimal(textBox12.Text); // Superficie
            string tipoPropiedad = textBox11.Text; // Tipo de propiedad
            decimal valor = Convert.ToDecimal(textBox10.Text); // Valor de la propiedad

            string queryPropiedad = "INSERT INTO Propiedad (codCatastral, direccion, distrito, zona, superficie, xIni, yIni, xFin, yFin, tipoPropiedad, valor, id_persona) " +
                                    "VALUES ('" + codCatastral + "', '" + direccion + "', " + distrito + ", '" + zona + "', " + superficie +
                                    ", " + xIni + ", " + yIni + ", " + xFin + ", " + yFin + ", '" + tipoPropiedad + "', " + valor + ", " + idPersona + ");";

            // Ejecutar la consulta para insertar la propiedad
            int filasAfectadasPropiedad = form1.ExecuteNonQuery(queryPropiedad);

            if (filasAfectadasPropiedad > 0)
            {
                MessageBox.Show("Persona y Propiedad insertadas correctamente.");
                form2.mostrarPropiedades();
                this.Close();
            }

           

          

         
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
