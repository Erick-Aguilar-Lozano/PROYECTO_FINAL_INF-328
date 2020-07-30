package com.umsa.repoDoc4.repoDoc4.repository;

import com.umsa.repoDoc4.repoDoc4.component.TestDataBaseConfiguration;
import com.umsa.repoDoc4.repoDoc4.model.Autores;
import org.junit.Assert;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringRunner;

@RunWith(SpringRunner.class)
@ContextConfiguration(classes = {TestDataBaseConfiguration.class})
public class AutoresRespositoryTest {

    @Autowired
    private AutoresRepository autoresRepository;

    @Test
    public void testInsert(){
        Autores autores = new Autores();
        autores.setId(1);
        autores.setNombre("test2");

        boolean resp = autoresRepository.insert(autores);
        Assert.assertTrue(resp);
    }
}
