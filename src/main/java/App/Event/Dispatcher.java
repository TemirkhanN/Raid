package App.Event;

public interface Dispatcher {
    void dispatch(String eventName, EventInterface event);
}
