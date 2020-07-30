package com.umsa.repoDoc4.repoDoc4.mapper;

import com.umsa.repoDoc4.repoDoc4.model.Editorial;
import org.springframework.jdbc.core.RowMapper;

import java.sql.ResultSet;
import java.sql.SQLException;

public class EditorialMapper implements RowMapper<Editorial> {
    @Override
    public Editorial mapRow(ResultSet rs, int i) throws SQLException {
        Editorial editorial = new Editorial();

        editorial.setId(rs.getInt("id"));
        editorial.setNombre(rs.getString("nombre"));

        return editorial;
    }
}
