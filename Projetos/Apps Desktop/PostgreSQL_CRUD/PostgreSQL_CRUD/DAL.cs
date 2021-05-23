using System;
using System.Data;
using System.Windows.Forms;
using Npgsql;

namespace PostgreSQL_CRUD
{
    public class DAL
    {
        static string serverName = "localhost";  //localhost
        static string port = "5432";             //porta default
        static string userName = "CucaPost";     //nome do administrador
        static string password = "1234";     //senha do administrador
        static string databaseName = "dpcuca"; //nome do banco de dados
        NpgsqlConnection pgsqlConnection = null;
        string connString = null;

        public DAL()
        {
             connString = String.Format("Server={0};Port={1};User Id={2};Password={3};Database={4};",
                                           serverName, port, userName, password, databaseName);
        }

        //Pega todos os registros e exibe no dataGridView
        public DataTable GetTodosRegistros()
        { 

            DataTable dt = new DataTable();

  
            try
            {
                using (pgsqlConnection = new NpgsqlConnection(connString))
                {
                    // abre a conexão com o PgSQL e define a instrução SQL
                    pgsqlConnection.Open();
                    string cmdSeleciona = "select f.cod_empresa as \"Empresa\", e.cnpj as \"CNPJ\", " +
                                            "f.cod_funcionario as \"Matricula\", f.nomefuncionario as \"Nome\", " +
                                            "f.cpfcic as \"CPF\", f.piscadastrado as \"PIS\", " +
                                            "to_char(f.dataadmissao, 'dd/mm/yyyy') as \"Admissão\", " +
                                            "f.caged as \"Tipo de Admissao\", " +
                                            "to_char(f.dataopcao, 'dd/mm/yyyy') as \"Data da Opção\", " +
                                            "f.demrais as \"DemRAIS\", f.demcaged as \"DemCAGED\", " +
                                            "f.demfgts as \"DemFGTS\", " +
                                            "to_char(f.datademissao, 'dd/mm/yyyy') as \"Demissão\" " +
                                            "from dpcuca.funcion f " +
                                            "left join dpcuca.empresas e on (e.id_empresa = f.cod_empresa)" +
                                            " order by f.datademissao";

                    using (NpgsqlDataAdapter Adpt = new NpgsqlDataAdapter(cmdSeleciona, pgsqlConnection))
                    {
                        Adpt.Fill(dt);
                       // MessageBox.Show("Valor da variavel Adpt: " + Adpt.Fill(dt));
                    }
                }
            }
            catch (NpgsqlException ex)
            {
                throw ex;
            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                pgsqlConnection.Close();
            }

            return dt;
        }


        //Pega um registro pelo codigo
        public DataTable GetRegistroPorNome(string nome)
        {

            DataTable dt = new DataTable();

            try
            {
                using (NpgsqlConnection pgsqlConnection = new NpgsqlConnection(connString))
                {
                    //Abra a conexão com o PgSQL
                    pgsqlConnection.Open();
                    string cmdSeleciona = String.Format("select f.cod_empresa as \"Empresa\", e.cnpj as \"CNPJ\", " +
                                            "f.cod_funcionario as \"Matricula\", f.nomefuncionario as \"Nome\", " +
                                            "f.cpfcic as \"CPF\", f.piscadastrado as \"PIS\", " +
                                            "to_char(f.dataadmissao, 'dd/mm/yyyy') as \"Admissão\", " +
                                            "f.caged as \"Tipo de Admissao\", " +
                                            "to_char(f.dataopcao, 'dd/mm/yyyy') as \"Data da Opção\", " +
                                            "f.demrais as \"DemRAIS\", f.demcaged as \"DemCAGED\", " +
                                            "f.demfgts as \"DemFGTS\", " +
                                            "to_char(f.datademissao, 'dd/mm/yyyy') as \"Demissão\" " +
                                            "from dpcuca.funcion f " +
                                            "left join dpcuca.empresas e on (e.id_empresa = f.cod_empresa)" +
                                            " where f.nomefuncionario like '%{0}%'" +
                                            " order by f.datademissao", nome);
                    
                    //MessageBox.Show("Valor da variavel cmdSeleciona: " + cmdSeleciona);

                    using (NpgsqlDataAdapter Adpt = new NpgsqlDataAdapter(cmdSeleciona, pgsqlConnection))
                    {
                        Adpt.Fill(dt);
                    }                   
                }
            }
            catch (NpgsqlException ex)
            {
                throw ex;
            }
            catch (Exception ex)
            {
                throw ex;
            }
            finally
            {
                //pgsqlConnection.Close();
            }
            return dt;
        }


    }
}
