package com.umsa.repoDoc4.repoDoc4.mapper;

import com.umsa.repoDoc4.repoDoc4.model.Documento;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

public class DocumentoMapper implements RowMapper<Documento> {
    @Override
    public Documento mapRow(ResultSet rs, int i) throws SQLException {
        Documento documento = new Documento();

        documento.setId(rs.getInt("id"));
        documento.setTitulo_p(rs.getString("titulo_p"));
        documento.setTitulo_s(rs.getString("titulo_s"));
        documento.setIdioma(rs.getString("idioma"));
        documento.setTipo(rs.getString("tipo"));
        documento.setRuta(rs.getString("ruta"));
        documento.setDescripcion(rs.getString("descripcion"));
        documento.setPalabras_clave(rs.getString("palabras_clave"));
        documento.setId_editorial(rs.getInt("id_editorial"));

        return documento;
    }
}
