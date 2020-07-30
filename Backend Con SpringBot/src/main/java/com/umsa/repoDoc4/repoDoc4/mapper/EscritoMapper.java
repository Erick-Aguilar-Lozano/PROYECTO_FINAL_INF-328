package com.umsa.repoDoc4.repoDoc4.mapper;

import com.umsa.repoDoc4.repoDoc4.model.Escrito;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

public class EscritoMapper implements RowMapper<Escrito> {
    @Override
    public Escrito mapRow(ResultSet rs, int i) throws SQLException {
        Escrito escrito = new Escrito();

        escrito.setId_documento(rs.getInt("id_documento"));
        escrito.setId_autor(rs.getInt("id_autor"));

        return escrito;
    }
}
