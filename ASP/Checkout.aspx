<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Checkout.aspx.cs" Inherits="WebApplication1.Content.Checkout" %>

<!doctype html>

<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Detailed poll</title>
    <meta name="description" content="Detailed poll">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">
    <link rel="stylesheet" type="text/css" href="poll.css">

</head>
<body>

    <nav>
        <a href="index.html">Back to the main page</a>
    </nav>
    <hr><br/>

    <section>
        

        <form autocomplete="on" runat=server> 
            <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
            <asp:UpdatePanel ID="myUpdatePanel" runat="server">
                <ContentTemplate>
              <p ID="tekst2" runat="server">Wybierz sposob dostawy:</p>
            <asp:RadioButtonList ID="rblist1" runat="server" AutoPostBack="True">
    
                 <asp:ListItem Text ="Kurier - 15 zł" Value="Kurier - 15 zł"/>
                 <asp:ListItem Text ="Poczta - 10 zł" Value="Poczta - 10 zł" />

                
             </asp:RadioButtonList><br/><br />
                                  <p ID="Koszyk" runat="server">Zawartość koszyka: </p><br /><br />
                                                      <p id="Podsumowanie" runat="server">Wartość całego zamówienia: </p><br /><br />
                    <a href="shop.aspx">Powrót do listy produktów.</a><br /><br />


           
                    <asp:Button ID="Button1" value="Złóż zamówienie" runat="server" Text="Button" usesubmitbehavior="true" OnClick="Next" /><br /><br />
                    
                     </ContentTemplate>
            </asp:UpdatePanel>
            
               

        </form>

    </section>

</body>
</html>