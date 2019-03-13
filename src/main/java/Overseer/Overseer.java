package Overseer;


import java.util.HashSet;
import java.util.Set;

public class Overseer {
    private static Overseer instance;

    private Set<Subject> subjects = new HashSet<Subject>();

    public static Overseer getInstance() {
        if (instance == null) {
            instance = new Overseer();
        }

        return instance;
    }

    public void observe(Subject subject) {
        if (subjects.contains(subject)) {
            return;
        }

        // TODO Some observation strategies iduhno
        subjects.add(subject);
    }

    private Overseer() {

    }
}
