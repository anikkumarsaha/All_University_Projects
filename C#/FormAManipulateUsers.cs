using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FinalProject
{
    public partial class FormAManipulateUsers : Form
    {
        private DataAccess Da { get; set; }
        private FormAdmin Fa { get; set; }



        public FormAManipulateUsers()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        public FormAManipulateUsers(FormAdmin fa) : this()
        {
            this.Fa = fa;
        }



        private void btnBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fa.Show();
        }



        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }



        private void PopulateGridView(string sql = "select* from TableUserLogin;")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvAddUser.AutoGenerateColumns = false;
            this.dgvAddUser.DataSource = ds.Tables[0];
        }



        private void FormAddUser_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void btnShow_Click(object sender, EventArgs e)
        {
            PopulateGridView();
        }



        private bool CheckRoleWithID()
        {
            string Id = this.txtUserID.Text;
            string[] s = Id.Split("-");

            if (s[0].Equals(this.cbRole.Text.Substring(0, 1)))
            {
                return true;
            }

            else return false;
        }



        private bool isInteger()
        {
            string Id = this.txtUserID.Text;
            string[] s = Id.Split("-");

            return (int.TryParse(s[1], out int _));
        }



        private void btnAdd_Click(object sender, EventArgs e)
        {
            try
            {
                if (!isAllTextFieldFilled())
                {
                    MessageBox.Show("All Fields are not filled properly");
                    return;
                }

                if (!CheckRoleWithID() || !isInteger())
                {
                    MessageBox.Show("INVALID INPUT");
                    return;
                }

                var qry = @"Select * from TableUserLogin where UserID = '" + txtUserID.Text + "';";
                var ds = Da.ExecuteQuery(qry);

                if (ds.Tables[0].Rows.Count == 1)
                {
                    MessageBox.Show("User already exixts");
                    return;
                }

                else
                {

                    var sql2 = @"INSERT INTO TableUserLogin
                                 VALUES ('" + this.txtUserID.Text + "', '" + this.txtPassword.Text + "', '" + this.cbRole.Text + "');";

                    int cnt = this.Da.ExecuteUpdateQuery(sql2);

                    if (cnt == 1)
                    {
                        MessageBox.Show("User insertion Successful");
                    }

                    else
                    {
                        MessageBox.Show("User insertion Unsuccessful. PLease try again.");
                    }
                }

                this.PopulateGridView();
            }

            catch (Exception exc)
            {
                MessageBox.Show("Error :" + exc.Message);
            }
        }



        private bool isAllTextFieldFilled()
        {
            if (String.IsNullOrEmpty(txtUserID.Text) || String.IsNullOrEmpty(txtPassword.Text) || String.IsNullOrEmpty(cbRole.Text))
            {
                return false;
            }

            else
                return true;
        }

        private void btnRemove_Click(object sender, EventArgs e)
        {
            try
            {
                var id = this.dgvAddUser.CurrentRow.Cells[0].Value.ToString();
                var role = this.dgvAddUser.CurrentRow.Cells[2].Value.ToString();


                if (role.Equals("admin"))
                {
                    MessageBox.Show("Can not delete an Admin");
                    return;
                }

                var sql = @"Delete from TableUserLogin where UserID = '" + id + "';";
                int cnt = this.Da.ExecuteUpdateQuery(sql);

                if (cnt == 1)
                {
                    MessageBox.Show("User deletion Successful");
                }

                else
                {
                    MessageBox.Show("User deletion Unsuccessful. Please try again.");
                }

                this.PopulateGridView();
            }

            catch (Exception exc)
            {
                MessageBox.Show("No row is selected\n Error :" + exc.Message);
            }
        }



        private void btnLogout_Click_1(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }



        private void btnBack_Click_1(object sender, EventArgs e)
        {
            this.Hide();
            Fa.Show();
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            this.txtUserID.Clear();
            this.txtPassword.Clear();
            this.cbRole.Text = "";
            string sql = @"select * from TableUserLogin
                           Where UserID like '" + this.txtSearch.Text + "%' or Role like '" + this.txtSearch.Text + "%';";
            this.PopulateGridView(sql);
        }


        private void dgvAddUser_CellDoubleClick(object sender, DataGridViewCellEventArgs e)
        {
            this.txtUserID.Text = this.dgvAddUser.CurrentRow.Cells["UserID"].Value.ToString();
            this.txtPassword.Text = this.dgvAddUser.CurrentRow.Cells["Password"].Value.ToString();
            this.cbRole.Text = this.dgvAddUser.CurrentRow.Cells["Role"].Value.ToString();
            
            if (!isAllTextFieldFilled())
            {
                MessageBox.Show("All Fields are not filled properly");
                return;
            }

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fa.Show();
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }


    }
}
