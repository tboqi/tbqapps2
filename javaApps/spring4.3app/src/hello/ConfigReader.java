package hello;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;
import org.springframework.core.env.Environment;

@Configuration
@PropertySource({ "classpath:/config.properties" })

public class ConfigReader {
	@Autowired
	Environment env;

	public String getProperty(String key) {
		return env.getProperty(key);
	}
}
