using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.Text;
using System.Data.SqlClient;
using System.Data;

namespace WcfServiceLibrary1
{
    // ПРИМЕЧАНИЕ. Команду "Переименовать" в меню "Рефакторинг" можно использовать для одновременного изменения имени класса "Service1" в коде и файле конфигурации.
    public class Service1 : IService1
    {
        DataSet ds;
        SqlDataAdapter adapter;
        string conn = @"Data Source=DESKTOP-CVHJNDO\SQLEXPRESS;Initial Catalog=Servis;Integrated Security=True";
       
        //всех записей
        public DataSet AllClients()
        {
            string proc = "AllClients";
            using(SqlConnection con=new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Client");
                con.Close();
            }
            return ds;
        }
        //получение одной записи
        public DataSet GetClient(int id)
        {
            string proc = "GetClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                ds = new DataSet();
                table.Columns.Add("id");
                table.Columns.Add("name");
                while (reader.Read())
                {
                    table.Rows.Add(reader.GetInt32(0), reader.GetString(1));
                }
                ds.Tables.Add(table);
                con.Close();
                return ds;
            }
        }
        //добавление
        public string InsClient(string fio)
        {
            string proc = "InsClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@name", Value = fio };
                command.Parameters.Add(parameter);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленного клиента: " + result;
            }
        }
        //удаление
        public string DelClient(int id)
        {
            string proc = "DelClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(paramete);
                var result = command.ExecuteScalar();
                con.Close();
                return "Клиент удален";
            }
        }
        //обновление
        public string UpdClient(int id, string fio)
        {
            string proc = "UpdClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(paramete);
                SqlParameter paramete1 = new SqlParameter { ParameterName = "@name", Value = fio };
                command.Parameters.Add(paramete1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Клиент " + id + " обновлен";
            }
        }


        public DataSet AllOrders()
        {
            string proc = "AllOrders";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Orders");
                con.Close();
            }
            return ds;
        }

        public DataSet GetOrder(int id)
        {
            string proc = "GetClient";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                ds = new DataSet();
                table.Columns.Add("id");
                table.Columns.Add("name");
                while (reader.Read())
                {
                    table.Rows.Add(reader.GetInt32(0), reader.GetString(1));
                }
                ds.Tables.Add(table);
                con.Close();
                return ds;
            }
        }

        public string InsOrder(int id)
        {
            string proc = "InsOrder";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленной заявки: " + result;
            }
        }

        public string DelOrder(int id)
        {
            string proc = "DelOrder";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(paramete);
                var result = command.ExecuteScalar();
                con.Close();
                return "Заявка удалена";
            }
        }

        public string UpdOrder(int idOr, int idCl)
        {
            string proc = "UpdOrder";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@idOr", Value = idOr };
                command.Parameters.Add(paramete);
                SqlParameter paramete1 = new SqlParameter { ParameterName = "@idCl", Value = idCl };
                command.Parameters.Add(paramete1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Заявка " + idOr + " обновлена";
            }
        }


        public DataSet AllUsluga()
        {
            string proc = "AllUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Usluga");
                con.Close();
            }
            return ds;
        }

        public DataSet GetUsluga(int id)
        {
            string proc = "GetUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                ds = new DataSet();
                table.Columns.Add("id");
                table.Columns.Add("name");
                table.Columns.Add("prcie");
                while (reader.Read())
                {
                    table.Rows.Add(reader.GetInt32(0), reader.GetString(1),reader.GetInt32(2));
                }
                ds.Tables.Add(table);
                con.Close();
                return ds;
            }
        }

        public string InsUsluga(string name, int price)
        {
            string proc = "InsUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {

                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@name", Value = name };
                command.Parameters.Add(parameter);
                SqlParameter parameter1 = new SqlParameter { ParameterName = "@price", Value = price };
                command.Parameters.Add(parameter1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленной услуги: " + result;
            }
        }

        public string DelUsluga(int id)
        {
            string proc = "DelUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(paramete);
                var result = command.ExecuteScalar();
                con.Close();
                return "Услуга удалена";
            }
        }

        public string UpdUsluga(int id, int price)
        {
            string proc = "UpdUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter paramete = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(paramete);
                SqlParameter paramete1 = new SqlParameter { ParameterName = "@price", Value = price };
                command.Parameters.Add(paramete1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Услуга " + id + " обновлена";
            }
        }


        public DataSet AllOredersUsluga()
        {
            string proc = "AllOredersUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                adapter = new SqlDataAdapter(proc, con);
                ds = new DataSet();
                adapter.Fill(ds, "Oreders_Usluga");
                con.Close();
            }
            return ds;
        }

        public DataSet GetOredersUsluga(int id)
        {
            string proc = "GetOredersUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {
                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@id", Value = id };
                command.Parameters.Add(parameter);
                SqlDataReader reader = command.ExecuteReader();
                DataTable table = new DataTable();
                ds = new DataSet();
                table.Columns.Add("order");
                table.Columns.Add("usluga");
                while (reader.Read())
                {
                    table.Rows.Add(reader.GetString(0), reader.GetString(1));
                }
                ds.Tables.Add(table);
                con.Close();
                return ds;
            }
        }

        public string InsOredersUsluga(int idOr, int idUs)
        {
            string proc = "InsOredersUsluga";
            using (SqlConnection con = new SqlConnection(conn))
            {

                con.Open();
                SqlCommand command = new SqlCommand(proc, con);
                command.CommandType = System.Data.CommandType.StoredProcedure;
                SqlParameter parameter = new SqlParameter { ParameterName = "@idOr", Value = idOr };
                command.Parameters.Add(parameter);
                SqlParameter parameter1 = new SqlParameter { ParameterName = "@idUs", Value = idUs };
                command.Parameters.Add(parameter1);
                var result = command.ExecuteScalar();
                con.Close();
                return "Id добавленной заявки-услуги: " + result;
            }
        }
    }
}
