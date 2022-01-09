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
    public partial class FormShopOwner : Form
    {
        private DataAccess Da { get; set; }
        private FormLogin Fs { get; set; }



        public FormShopOwner()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
            this.AutoID();
        }



        public FormShopOwner(FormLogin fs) : this()
        {
            this.Fs = fs;
        }



        private void FormInventory_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fs.Show();
        }



        private void btnShow_Click(object sender, EventArgs e)
        {
            this.AutoID();
            this.txtProductName.Clear();
            this.txtProductPrice.Clear();
            this.txtProductQuantity.Clear();
            this.PopulateGridView();
        }



        private void PopulateGridView(string sql = "select * from TProduct;")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvInventory.AutoGenerateColumns = false;
            this.dgvInventory.DataSource = ds.Tables[0];
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            string sql = @"select * from TProduct
                           Where ProductName like '" + this.txtSearch.Text + "%';";
            this.PopulateGridView(sql);
        }

        private bool isInteger()
        {
            return (int.TryParse(this.txtProductName.Text, out int _));
        }



        private void btnAdd_Click(object sender, EventArgs e)
        {
            try
            {
                if (!isAllTextFieldFilled() || isInteger())
                {
                    MessageBox.Show("All Fields are not filled properly");
                    return;
                }
                //var qry1 = @"Select * from TableProductMember where ProductID = '" + txtProductID.Text + "';";
                
                var qry2 = @"Select * from TProduct where ProductID = '" + txtProductID.Text + "';";
                
                //var ds1 = Da.ExecuteQuery(qry1);
                var ds2 = Da.ExecuteQuery(qry2);

                //MessageBox.Show(ds2.Tables[0].Rows.Count.ToString());
                if (ds2.Tables[0].Rows.Count == 1)
                {
                    //update
                    try
                    {

                        //var sql1 = @"UPDATE TableProductMember SET ProductID = '" + this.txtProductID.Text + "' WHERE ProductID = '" + this.txtProductID.Text + "';";
                        var sql2 = @"UPDATE TProduct SET ProductName = '" + this.txtProductName.Text + "', ProductPrice = '" + this.txtProductPrice.Text + "', ProductQuantity = '" + this.txtProductQuantity.Text + "' WHERE ProductID = '" + this.txtProductID.Text + "';";

                        //int cnt1 = this.Da.ExecuteUpdateQuery(sql1);
                        int cnt2 = this.Da.ExecuteUpdateQuery(sql2);

                        if (cnt2 == 1)
                        {
                            MessageBox.Show("Data Update Successful");
                            this.AllClear();
                        }
                        else
                        {
                            MessageBox.Show("Data update Unsuccessful. PLease try again");
                        }
                    }

                    catch (Exception exc)
                    {
                        MessageBox.Show("Error :" + exc.Message);
                    }
                }
                else
                {
                    if (Convert.ToInt32(this.txtProductQuantity.Text) > 0 && !isInteger())
                    {                    
                        var sql2 = @"INSERT INTO TProduct VALUES ('" + this.txtProductID.Text + "', '" + this.txtProductName.Text + "', '" + this.txtProductPrice.Text + "','" + txtProductQuantity.Text + "');";
                        int cnt = this.Da.ExecuteUpdateQuery(sql2);

                        if (cnt == 1)
                        {
                            MessageBox.Show("Data insertion Successful");
                            this.AllClear();
                        }

                        else
                        {
                            MessageBox.Show("Data insertion Unsuccessful. PLease try again.");
                        }
                    }
                    else
                    {
                        MessageBox.Show("Invalid Fields\nCheck Product Name or Quantity");
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
            if (String.IsNullOrEmpty(txtProductID.Text) || String.IsNullOrEmpty(txtProductName.Text) || String.IsNullOrEmpty(txtProductQuantity.Text) || String.IsNullOrEmpty(txtProductPrice.Text))
            {
                return false;
            }
            else
                return true;
        }



        private void dgvInventory_DoubleClick(object sender, EventArgs e)
        {
            this.txtProductName.Text = this.dgvInventory.CurrentRow.Cells["ProductName"].Value.ToString();
            this.txtProductID.Text = this.dgvInventory.CurrentRow.Cells["ProductID"].Value.ToString();
            this.txtProductQuantity.Text = this.dgvInventory.CurrentRow.Cells["ProductQuantity"].Value.ToString();
            this.txtProductPrice.Text = this.dgvInventory.CurrentRow.Cells["ProductPrice"].Value.ToString();

            if (!isAllTextFieldFilled())
            {
                MessageBox.Show("All Fields are not filled properly");
                return;
            }
        }



        private void btnRemove_Click(object sender, EventArgs e)
        {

            var id = this.dgvInventory.CurrentRow.Cells[0].Value.ToString();
            var name = this.dgvInventory.CurrentRow.Cells[1].Value.ToString();


            try
            {
                var sql = @"Delete from Tproduct where ProductID = '" + id + "' and ProductName = '" + name + "';";
                //var sql2 = @"Delete from TableProductMember where ProductID = '" + id + "';";
                //int cnt2 = this.Da.ExecuteUpdateQuery(sql2);
                int cnt1 = this.Da.ExecuteUpdateQuery(sql);

                if (cnt1 == 1)
                {
                    MessageBox.Show("Data deletion Successful");
                }
                else
                {
                    MessageBox.Show("Data deletion Unsuccessful. PLease try again.");

                }
                this.AllClear();
                this.PopulateGridView();
            }

            catch (Exception exc)
            {
                MessageBox.Show("Error :" + exc.Message);
            }
        }



        private void AutoID()
        {
            string sql = "select ProductID from TProduct order by ProductID desc;";
            DataTable dt = Da.ExecuteQueryTable(sql);

            string oldId = dt.Rows[0]["ProductID"].ToString();
            string[] s = oldId.Split("-");
            int num = Convert.ToInt32(s[1]);
            string newID = "p-" + (++num).ToString("d2");
            this.txtProductID.Text = newID;
        }

        private void AllClear()
        {
            this.txtProductID.Clear();
            this.txtProductName.Clear();
            this.txtProductPrice.Clear();
            this.txtProductQuantity.Clear();
            this.AutoID();
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.AllClear();
        }
        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fs.Show();
        }
    }
}
