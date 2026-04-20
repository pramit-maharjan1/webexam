<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
        <head>
            <title>Products Table</title>
            <style>
                table { border-collapse: collapse; width: 60%; }
                th, td { border: 1px solid black; padding: 8px; }
                th { background-color: #f2f2f2; }
            </style>
        </head>

        <body>
            <h2>Product List</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Brand</th>
                </tr>

                <xsl:for-each select="products/product">
                    <tr>
                        <td><xsl:value-of select="id"/></td>
                        <td><xsl:value-of select="name"/></td>
                        <td><xsl:value-of select="price"/></td>
                        <td><xsl:value-of select="brand"/></td>
                    </tr>
                </xsl:for-each>

            </table>

        </body>
        </html>
    </xsl:template>

</xsl:stylesheet>