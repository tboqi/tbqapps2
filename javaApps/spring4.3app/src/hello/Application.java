package hello;

import java.io.IOException;
import java.io.InputStream;
import java.util.Properties;

import org.springframework.beans.factory.BeanFactory;
import org.springframework.beans.factory.support.BeanDefinitionRegistry;
import org.springframework.beans.factory.support.DefaultListableBeanFactory;
import org.springframework.beans.factory.support.PropertiesBeanDefinitionReader;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.*;
import org.springframework.core.io.ClassPathResource;

@Configuration
@ComponentScan
public class Application {

	@Bean
	MessageService mockMessageService() {
		return new MessageService() {
			public String getMessage() {
				return "Hello World!";
			}
		};
	}

	@Bean
	HelloBean HelloService() {
		return new HelloBean();
	}

	public static void main(String[] args) {
		ApplicationContext context = new AnnotationConfigApplicationContext(Application.class);
		MessagePrinter printer = context.getBean(MessagePrinter.class);
		printer.printMessage();

		InputStream inputStream = (new Application()).getClass().getClassLoader()
				.getResourceAsStream("config.properties");

		Properties p = new Properties();

		try {

			p.load(inputStream);

		} catch (IOException e1) {

			e1.printStackTrace();

		}

		System.out.println("ip:" + p.getProperty("database.type") + 
				",isDebugModel:" + p.getProperty("isDebugModel"));
	}
}