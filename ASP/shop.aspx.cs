using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication1.Content
{
    public partial class shop : System.Web.UI.Page
    {
        private static int ilosc;
        static List<string> list1 = new List<string>();
        static List<int> list2 = new List<int>();
        static Hashtable Produkt = new Hashtable();
        static Hashtable Cena = new Hashtable();

        protected void Page_Load(object sender, EventArgs e)
        {



            if (!Page.IsPostBack && Session["ilosc"]==null)
            {
                Produkt = new Hashtable();
                Cena = new Hashtable();
                list1 = new List<string>();
                list2 = new List<int>();
                Produkt.Add(1, "Telewizor");
                Produkt.Add(2, "Sofa");
                Produkt.Add(3, "Drzewo");
                Produkt.Add(4, "Bruk");

                Cena.Add(1, 1500);
                Cena.Add(2, 1111);
                Cena.Add(3, 413);
                Cena.Add(4, 24);
                ilosc = 0;
                Label1.Text = "Ilosc produktow w koszyku: " + ilosc;
            }

            if(Session["ilosc"] != null)
            {

                ilosc = (int) Session["ilosc"];
                list1 = (List<string>)Session["Products"];
                list2 = (List<int>)Session["Values"];
                Label1.Text = "Ilosc produktow w koszyku: " + ilosc;

            }

            checkboxlist1.Items[0].Text = Produkt[1].ToString();
            checkboxlist1.Items[0].Text += " - " + Cena[1].ToString();
            checkboxlist1.Items[1].Text = Produkt[2].ToString();
            checkboxlist1.Items[1].Text += " - " + Cena[2].ToString();
            checkboxlist2.Items[0].Text = Produkt[3].ToString();
            checkboxlist2.Items[0].Text += " - " + Cena[3].ToString();
            checkboxlist2.Items[1].Text = Produkt[4].ToString();
            checkboxlist2.Items[1].Text += " - " + Cena[4].ToString();


            if (rblist1.SelectedIndex == 0)
            {
                checkboxlist1.Visible = true;
                checkboxlist2.Visible = false;
            }else if(rblist1.SelectedIndex == 1)
            {
                checkboxlist1.Visible = false;
                checkboxlist2.Visible = true;
            }
            else
            {
                checkboxlist1.Visible = false;
                checkboxlist2.Visible = false;
            }

        }

        protected void Add(object sender, EventArgs e)
        {
            bool exists = false;
            string[] words;

            foreach(ListItem v in checkboxlist1.Items)
            {
                exists = false;
                words = v.Text.Split(' ');
                foreach (string item in list1)
                {
                    
                    if(words[0] == item)
                    {
                        exists = true;
                    }
                }

                foreach (int item in list2)
                {

                    if (int.Parse(words[2]) == item)
                    {
                        exists = true;
                    }
                }


                if (!exists && v.Selected)
                {
                    ilosc++;
                    list1.Add(words[0]);
                    list2.Add(int.Parse(words[2]));
                }
            }

            foreach (ListItem v in checkboxlist2.Items)
            {
                exists = false;
                words = v.Text.Split(' ');
                foreach (string item in list1)
                {

                    if (words[0] == item)
                    {
                        exists = true;
                    }
                }
                if (!exists && v.Selected)
                {
                    ilosc++;
                    list1.Add(words[0]);
                    list2.Add(int.Parse(words[2]));
                }
            }

            Session["ilosc"] = ilosc;
            Session["Products"] = list1;
            Session["Values"] = list2;
            Label1.Text = "Ilosc produktow w koszyku: " + ilosc;

        }
    }
}