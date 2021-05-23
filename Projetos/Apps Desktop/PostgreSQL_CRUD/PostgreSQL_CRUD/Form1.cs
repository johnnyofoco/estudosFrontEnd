using System;
using System.Windows.Forms;

namespace PostgreSQL_CRUD
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        //int codigo;
        DAL acesso = new DAL();
        

        //Metódo executado quando o usuário clica no botão exibir.
        private void btnExibir_Click(object sender, EventArgs e)
        {
            try
            {
                atualizarExibicao(); 
            }
            catch (Exception ex)
            {
                MessageBox.Show("Erro : " + ex.Message);
            }
        }

        private void atualizarExibicao()
        {
            dgvFunci.DataSource = acesso.GetTodosRegistros();
        }

        private void atualizarExibicaoPorNome()
        {
            dgvFunci.DataSource = acesso.GetRegistroPorNome(txtNome.Text.ToString());
        }


        //Metódo para preencher os campos com o registro selecionado 
        // Quando o usuário clica no dataGridView (Não vou utilizar isso).
        /*private void dgvFunci_CellEnter(object sender, DataGridViewCellEventArgs e)
        {
            codigo = Convert.ToInt32(dgvFunci.Rows[e.RowIndex].Cells[0].Value);
            txtNome.Text = Convert.ToString(dgvFunci.Rows[e.RowIndex].Cells[1].Value);
            txtEmail.Text = Convert.ToString(dgvFunci.Rows[e.RowIndex].Cells[2].Value);
            txtIdade.Text = Convert.ToString(dgvFunci.Rows[e.RowIndex].Cells[3].Value);
        }*/

        public void limpaTextBox(Control control)
        {
            foreach (Control c in control.Controls)
            {
                if (c is TextBox)
                {
                    ((TextBox)c).Clear();
                }
                if (c.HasChildren)
                {
                    limpaTextBox(c);
                }
            }
        }

        private void Mensagem()
        {
            MessageBox.Show("Operação realizada com sucesso !");
        }

        private void btnPesquisar_Click(object sender, EventArgs e)
        {
            //MessageBox.Show("Valor do campo txtNome: " + txtNome.Text.ToString());

            try
            {
                atualizarExibicaoPorNome();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Erro : " + ex.Message);
            }
        }

    }
}

