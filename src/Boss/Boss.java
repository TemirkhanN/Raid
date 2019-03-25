package Boss;

import Overseer.Subject;
import Overseer.Target;

public class Boss implements Target, Subject {
    private String name;

    public Boss(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }
}
