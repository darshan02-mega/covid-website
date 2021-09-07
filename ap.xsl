<?xml version = "1.0" encoding = "UTF-8"?>  
<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">     
    <xsl:template match = "/">   
        <html>   
         <body>  
            <h2>covid table</h2>   
            <table border = "1">   
               <tr bgcolor = "#9acd32">   
                  <th>s.no</th>   
                  <th>heading</th>   
                  <th>Descriptions</th>   
                     
               </tr>   
               <xsl:for-each select="class/precaution">   
                  <tr>   
                     <td>   
                        <xsl:value-of select = "@id"/>   
                     </td>   
                     <td><xsl:value-of select = "heading"/></td>   
                     <td><xsl:value-of select = "description"/></td>   
                     
                  </tr>   
               </xsl:for-each>   
            </table>   
         </body>   
      </html>   
   </xsl:template>    
</xsl:stylesheet>  