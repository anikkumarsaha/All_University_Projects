using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace FinalProject
{
    public partial class FormLogin : Form
    {
        internal String UserID { get; set; }



        public FormLogin()
        {
            InitializeComponent();
        }



        private bool isAllTextFieldFilled()
        {
            if (String.IsNullOrEmpty(this.txtUsername.Text) || String.IsNullOrEmpty(this.txtPassword.Text))
            {
                return false;
            }
            else
                return true;
        }



        private void btnLogin_Click(object sender, EventArgs e)
        {
            if (!isAllTextFieldFilled())
            {
                MessageBox.Show("All Fields are not filled properly");
                return;
            }

            string sql = @"select * from TableUserLogin
                           where UserID = '" + this.txtUsername.Text + "' and Password = '" + this.txtPassword.Text + "';";

            DataAccess da = new DataAccess();
            DataTable DS = da.ExecuteQueryTable(sql);

            if (DS.Rows.Count == 1 && DS.Rows[0][1].Equals(this.txtPassword.Text))
            {
                this.Hide();

                if (DS.Rows[0][2].ToString() == "admin")
                {
                    FormAdmin admin = new FormAdmin(this);
                    admin.Show();
                    this.ClearContent();
                }

                else if (DS.Rows[0][2].ToString() == "member")
                {
                    string s = DS.Rows[0][0].ToString();
                    FormMember member = new FormMember(this, s);
                    member.Show();
                    this.ClearContent();
                }

                else if (DS.Rows[0][2].ToString() == "vet")
                {
                    string VetID = DS.Rows[0][0].ToString();
                    FormVet Fcl = new FormVet(this, VetID);
                    Fcl.Show();
                    this.ClearContent();
                }

                else if (DS.Rows[0][2].ToString() == "shop")
                {
                    FormShopOwner shop = new FormShopOwner(this);
                    shop.Show();
                    this.ClearContent();
                }
            }

            else
            {
                MessageBox.Show("Invalid login info. Please try again.");
                this.ClearContent();
            }

            da.CloseConnection();
        }



        private void btnClear_Click(object sender, EventArgs e)
        {
            this.ClearContent();
        }



        private void ClearContent()
        {
            this.txtUsername.Clear();
            this.txtPassword.Clear();
        }



        private void FormLogin_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }

        private void cbShowPassword_CheckedChanged(object sender, EventArgs e)
        {
            if(this.cbShowPassword.Checked)
            {
                txtPassword.UseSystemPasswordChar = true;
            }
            else
            {
                txtPassword.UseSystemPasswordChar = false;
            }

        }
    }
}
