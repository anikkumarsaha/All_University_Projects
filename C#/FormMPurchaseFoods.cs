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
    public partial class FormMPurchaseFoods : Form
    {
        private DataAccess Da { get; set; }
        private FormMember Fm { get; set; }
        private string MemberID { get; set; }



        public FormMPurchaseFoods()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        public FormMPurchaseFoods(FormMember fm) : this()
        {
            this.Fm = fm;
        }



        public FormMPurchaseFoods(FormMember fm, string s) : this()
        {
            this.MemberID = s;
            this.Fm = fm;
        }



        private void FormFoodList_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
            Da.CloseConnection();
        }



        private void btnShowList_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            string sql = @"select * from TProduct
                           Where ProductName like '" + this.txtSearch.Text + "%';";

            this.PopulateGridView(sql);
        }



        private void PopulateGridView(string sql = @"select * from TProduct;")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvFoodList.AutoGenerateColumns = false;
            this.dgvFoodList.DataSource = ds.Tables[0];
        }



        private void dgvFoodList_DoubleClick(object sender, EventArgs e)
        {
            this.txtProductName.Text = this.dgvFoodList.CurrentRow.Cells["ProductName"].Value.ToString();
        }



        private bool isAllTextFieldFilled()
        {
            if (String.IsNullOrEmpty(txtProductName.Text) || String.IsNullOrEmpty(txtQuantity.Text))
            {
                return false;
            }
            else
                return true;
        }



        private void btnPurchase_Click(object sender, EventArgs e)
        {
            if (!isAllTextFieldFilled())
            {
                MessageBox.Show("All Fields are not filled properly");
                return;
            }

            try
            {
                var qry = @"Select * from TProduct where ProductID = '" + this.dgvFoodList.CurrentRow.Cells["ProductID"].Value.ToString() + "';";

                var ds = Da.ExecuteQuery(qry);
                int MainQuantity = Convert.ToInt32(ds.Tables[0].Rows[0][3].ToString());

                if (ds.Tables[0].Rows.Count == 1)
                {
                    //update
                    try
                    {
                        var quantity = Convert.ToInt32(this.txtQuantity.Text);
                        if (MainQuantity >= quantity && quantity > 0)
                        {
                            var sql2 = "UPDATE TProduct SET ProductQuantity = " + (MainQuantity - quantity) + " where ProductID = '" + this.dgvFoodList.CurrentRow.Cells["ProductID"].Value.ToString() + "';";

                            int cnt = this.Da.ExecuteUpdateQuery(sql2);
                            if (cnt == 1)
                            {
                                var qwerForInsertion = @"INSERT INTO TOrderList (MemberID, ProductID, Cost) VALUES ('" + this.MemberID + "', '" + this.dgvFoodList.CurrentRow.Cells["ProductID"].Value.ToString() + "', " + Convert.ToInt32(this.txtQuantity.Text) * Convert.ToInt32(this.dgvFoodList.CurrentRow.Cells["ProductPrice"].Value.ToString()) + ");";

                                int cnt0 = this.Da.ExecuteUpdateQuery(qwerForInsertion);
                              
                                MessageBox.Show("Purchase successful");
                            }
                            else
                            {
                                MessageBox.Show("Purchase unsuccessful. Please try again.");
                            }
                        }

                        else if (quantity <= 0)
                            MessageBox.Show("Invalid Quantity");

                        else
                            MessageBox.Show("Not Enough Items in Stock");
                    }

                    catch (Exception exc)
                    {
                        MessageBox.Show("Please enter Integer Value" + exc.Message);
                    }

                    this.PopulateGridView();
                }
            }

            catch (Exception exc)
            {
                MessageBox.Show("Invalid Input\n" + exc.Message);
            }
        }



        private void pictureBoxLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }



        private void pictureBoxBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fm.Show();
        }
    }
}
