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
    public partial class FormACheckPurchaseList : Form
    {
        private DataAccess Da { get; set; }
        private FormAdmin Fa { get; set; }



        public FormACheckPurchaseList()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        public FormACheckPurchaseList(FormAdmin fa) : this()
        {
            this.Fa = fa;
        }



        private void FormInventory_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void PopulateGridView(string sql = @"SELECT TOrderList.OrderNumber,TOrderList.MemberID, TProduct.ProductName, TOrderList.Cost, TOrderList.ProductID
                                                      FROM TOrderList
                                                      INNER JOIN TProduct ON TOrderList.ProductID = TProduct.ProductID")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvOrderList.AutoGenerateColumns = false;
            this.dgvOrderList.DataSource = ds.Tables[0];
            Da.CloseConnection();

        }



        private bool isAllTextFieldFilled()
        {
            if (String.IsNullOrEmpty(txtSearch.Text))
            {
                return false;
            }
            else
                return true;
        }



        private void btnShow_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }



        private void txtProductID_TextChanged(object sender, EventArgs e)
        {
            string sqlInnerJoin = @"SELECT TOrderList.OrderNumber,TOrderList.MemberID, TProduct.ProductName, TOrderList.Cost, TOrderList.ProductID
                           FROM TOrderList
                           INNER JOIN TProduct ON TOrderList.ProductID = TProduct.ProductID
                           Where TProduct.ProductID like '" + this.txtSearch.Text + "%' or TProduct.ProductName like '" + this.txtSearch.Text + "%' or TOrderList.OrderNumber like '" + this.txtSearch.Text + "%' or TOrderList.MemberID  like '" + this.txtSearch.Text + "%' or TOrderList.Cost  like '" + this.txtSearch.Text + "%' ";
            this.PopulateGridView(sqlInnerJoin);
            Da.CloseConnection();
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
