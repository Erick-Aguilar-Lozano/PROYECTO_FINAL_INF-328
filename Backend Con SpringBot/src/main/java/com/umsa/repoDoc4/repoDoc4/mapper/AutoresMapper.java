package com.umsa.repoDoc4.repoDoc4.mapper;

import com.umsa.repoDoc4.repoDoc4.model.Autores;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

public class AutoresMapper implements RowMapper<Autores> {

    @Override
    public Autores mapRow(ResultSet rs, int i) throws SQLException {
        Autores autores = new Autores();

        autores.setId(rs.getInt("id"));
        autores.setNombre(rs.getString("nombre"));

        return autores;
    }
}
