using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication1.Content
{
    
    public partial class Checkout : System.Web.UI.Page
    {

        static int suma = 0;

        protected void Page_Load(object sender, EventArgs e)
        {

            if (!Page.IsPostBack)
            {
                suma = 0;
                if (Session["Values"] != null)
                {
                    
                    List<int> list1 = (List<int>)Session["Values"];

                    foreach(int v in list1)
                    {
                        suma += v;
                    }

                    foreach(string x in (List<string>)Session["Products"])
                    {
                        Koszyk.InnerHtml += " " + x;

                    }

                    rblist1.SelectedIndex = 0;
                }
                else
                {
                    Button1.Enabled = false;
                }

            }

            Podsumowanie.InnerHtml = "Wartość całego zamówienia: " + suma;


            if (rblist1.SelectedIndex == 0)
            {
                int v = suma + 15;
                Session["sum"] = v;
                Podsumowanie.InnerHtml = "Wartość całego zamówienia: " + v;

            }
            else if (rblist1.SelectedIndex == 1)
            {
                int v = suma + 10;
                Session["sum"] = v;
                Podsumowanie.InnerHtml = "Wartość całego zamówienia: " + v;

            }
            else
            {
                Podsumowanie.InnerHtml = "Wartość całego zamówienia: " + suma;
            }
        }

        public void Next(object sender, EventArgs e)
        {
            Response.Redirect("order.aspx");
        }
    }
}